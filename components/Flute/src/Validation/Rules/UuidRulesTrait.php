<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Validation\Rules;

use Limoncello\Validation\Contracts\Rules\RuleInterface;
use Limoncello\Validation\Rules\Generic\AndOperator;
use Lolltec\Limoncello\Flute\Validation\JsonApi\Rules\IsValidUuidRule;

/**
 * @package Lolltec\Limoncello\Flute
 */
trait UuidRulesTrait
{
    /**
     * @param RuleInterface|null $next
     *
     * @return RuleInterface
     */
    protected static function isUuid(RuleInterface $next = null): RuleInterface
    {
        $primary = new IsValidUuidRule();

        return $next === null ? $primary : new AndOperator($primary, $next);
    }
}
