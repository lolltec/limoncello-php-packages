<?php declare (strict_types=1);

namespace Lolltec\Limoncello\Flute\Contracts\Http\Route;

/**
 * @package Lolltec\Limoncello\Flute
 */
interface KeyIndexInterface
{
    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param string $value
     */
    public function setValue(string $value): void;
}
