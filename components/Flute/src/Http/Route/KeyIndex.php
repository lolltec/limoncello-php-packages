<?php declare (strict_types=1);

namespace Lolltec\Limoncello\Flute\Http\Route;

use Lolltec\Limoncello\Flute\Contracts\Http\Route\KeyIndexInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
class KeyIndex implements KeyIndexInterface
{
    /**
     * @var
     */
    private $value;

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function setValue(string $value): void
    {
        $this->setValue($value);
    }
}
