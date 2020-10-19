<?php declare (strict_types=1);

namespace Lolltec\Limoncello\Flute\Contracts\Http\Route;

/**
 * @package Lolltec\Limoncello\Flute
 */
interface RouteKeyIndexInterface
{
    /**
     * @return string|null
     */
    public function getValue(): ?string;

    /**
     * @param string|null $value
     */
    public function setValue(string $value = null): void;
}
