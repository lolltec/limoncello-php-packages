<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Validation\JsonApi\Rules;

use Limoncello\Validation\Contracts\Execution\ContextInterface;
use Limoncello\Validation\Rules\ExecuteRule;
use NiftyCorner\Limoncello\Flute\Contracts\Validation\ErrorCodes;
use NiftyCorner\Limoncello\Flute\L10n\Messages;
use Ramsey\Uuid\Validator\ValidatorInterface as UuidValidatorInterface;

/**
 * @package NiftyCorner\Limoncello\Flute
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
