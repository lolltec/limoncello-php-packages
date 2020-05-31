<?php declare (strict_types=1);

namespace Lolltec\Limoncello\Flute\Validation\Rules;

use Limoncello\Validation\Contracts\Rules\RuleInterface;
use Limoncello\Validation\Rules\Generic\AndOperator;
use Lolltec\Limoncello\Flute\Validation\JsonApi\Rules\UniqueInDbTableSingleWithDoctrineRule;

/**
 * @package Lolltec\Limoncello\Flute
 */
trait DatabaseRulesTrait
{
    use \Limoncello\Flute\Validation\Rules\DatabaseRulesTrait {
        unique as defaultUnique;
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
        $primary = new UniqueInDbTableSingleWithDoctrineRule($tableName, $primaryName, $primaryKey);

        return $next === null ?
            $primary :
            new AndOperator($primary, $next);
    }
}
