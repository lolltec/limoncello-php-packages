<?php declare (strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Validation\Rules;

use Limoncello\Validation\Contracts\Rules\RuleInterface;
use Limoncello\Validation\Rules\Generic\AndOperator;
use NiftyCorner\Limoncello\Flute\Validation\JsonApi\Rules\UniqueInDbTableSingleWithDoctrineRule as DefaultUniqueInDbTableSingleWithDoctrineRule;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
trait DatabaseRulesTrait
{
    use \Limoncello\Flute\Validation\Rules\DatabaseRulesTrait {
        unique as unique;
    }

    /**
     * @param string             $tableName
     * @param string             $primaryName
     * @param string|null        $primaryKey
     * @param RuleInterface|null $next
     *
     * @return RuleInterface
     */
    protected static function defaultUnique(
        string $tableName,
        string $primaryName,
        ?string $primaryKey = null,
        RuleInterface $next = null
    ): RuleInterface
    {
        $primary = new DefaultUniqueInDbTableSingleWithDoctrineRule($tableName, $primaryName, $primaryKey);

        return $next === null ?
            $primary :
            new AndOperator($primary, $next);
    }
}
