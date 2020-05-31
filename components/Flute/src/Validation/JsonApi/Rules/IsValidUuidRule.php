<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Validation\JsonApi\Rules;

use Limoncello\Validation\Contracts\Execution\ContextInterface;
use Limoncello\Validation\Rules\ExecuteRule;
use Lolltec\Limoncello\Flute\Contracts\Validation\ErrorCodes;
use Lolltec\Limoncello\Flute\L10n\Messages;
use Ramsey\Uuid\Validator\ValidatorInterface as UuidValidatorInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
final class IsValidUuidRule extends ExecuteRule
{
    /**
     * @inheritDoc
     */
    public static function execute($value, ContextInterface $context): array
    {
        /** @var UuidValidatorInterface $uuidValidator */
        $uuidValidator = $context->getContainer()->get(UuidValidatorInterface::class);

        return $uuidValidator->validate($value) === true ?
            static::createSuccessReply($value) :
            static::createErrorReply(
                $context,
                $value,
                ErrorCodes::INVALID_UUID,
                Messages::INVALID_UUID,
                []
            );
    }
}
