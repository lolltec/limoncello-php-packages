<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Http;

use Limoncello\Contracts\Session\SessionInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
abstract class JsonApiBaseController extends \Limoncello\Flute\Http\JsonApiBaseController
{
    /**
     * @inheritDoc
     */
    public static function update(
        array $routeParams,
        ContainerInterface $container,
        ServerRequestInterface $request
    ): ResponseInterface
    {
        /** @var SessionInterface $session */
        $session = $container->get(SessionInterface::class);
        $session['key_index'] = $routeParams[static::ROUTE_KEY_INDEX];

        return parent::update($routeParams, $container, $request);
    }
}
