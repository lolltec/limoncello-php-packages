<?php declare (strict_types=1);

namespace Lolltec\Limoncello\Flute\Validation\JsonApi\Rules;

use Doctrine\DBAL\Connection;
use Limoncello\Contracts\Session\SessionInterface;
use Limoncello\Flute\Contracts\Validation\ErrorCodes;
use Limoncello\Flute\L10n\Messages;
use Limoncello\Validation\Contracts\Execution\ContextInterface;
use Limoncello\Validation\Rules\ExecuteRule;
use Lolltec\Limoncello\Contracts\Route\RouteKeyIndexInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
class UniqueInDbTableSingleWithDoctrineRule extends ExecuteRule
{
    /**
     * Property key
     */
    const PROPERTY_TABLE_NAME = self::PROPERTY_LAST + 1;
    /**
     * Property key
     */
    const PROPERTY_PRIMARY_NAME = self:: PROPERTY_TABLE_NAME + 1;
    /**
     * Property key
     */
    const PROPERTY_PRIMARY_KEY = self::PROPERTY_PRIMARY_NAME + 1;

    /**
     * @inheritDoc
     */
    public function __construct(string $tableName, string $primaryName, ?string $primaryKey = null)
    {
        parent::__construct([
            static::PROPERTY_TABLE_NAME   => $tableName,
            static::PROPERTY_PRIMARY_NAME => $primaryName,
            static::PROPERTY_PRIMARY_KEY  => $primaryKey,
        ]);
    }

    /**
     * @inheritDoc
     */
    public static function execute($value, ContextInterface $context): array
    {
        $found = false;

        if (is_scalar($value) === true) {
            /** @var Connection $connection */
            $connection = $context->getContainer()->get(Connection::class);
            $builder    = $connection->createQueryBuilder();

            $tableName   = $context->getProperties()->getProperty(static::PROPERTY_TABLE_NAME);
            $primaryName = $context->getProperties()->getProperty(static::PROPERTY_PRIMARY_NAME);
            $primaryKey  = $context->getProperties()->getProperty(static::PROPERTY_PRIMARY_KEY);

            $columnNames = isset($primaryKey) ? "`{$primaryKey}`, `{$primaryName}`" : "`{$primaryName}`";

            $statement = $builder
                ->select($columnNames)
                ->from($tableName)
                ->where($builder->expr()->eq($primaryName, $builder->createPositionalParameter($value)))
                ->setMaxResults(1);

            $fetched = $statement->execute()->fetch();

            /** @var SessionInterface $session */
            $session = $context->getContainer()->get(SessionInterface::class);

            $routeKeyIndex =
                isset($session[RouteKeyIndexInterface::PARAM_ROUTE_KEY_INDEX]) === true ?
                    $session[RouteKeyIndexInterface::PARAM_ROUTE_KEY_INDEX] :
                    null;

            $found = isset($primaryKey) ?
                $fetched !== false && $fetched[$primaryKey] !== $routeKeyIndex :
                $fetched !== false;
        }

        $reply = $found === false ?
            static::createSuccessReply($value) :
            static::createErrorReply(
                $context,
                $value,
                ErrorCodes::UNIQUE_IN_DATABASE_SINGLE,
                Messages::UNIQUE_IN_DATABASE_SINGLE,
                []
            );

        return $reply;
    }
}
