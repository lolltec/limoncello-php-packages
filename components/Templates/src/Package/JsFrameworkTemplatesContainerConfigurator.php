<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Templates\Package;

use Limoncello\Contracts\Application\ContainerConfiguratorInterface;
use Limoncello\Contracts\Container\ContainerInterface as LimoncelloContainerInterface;
use Limoncello\Contracts\Settings\SettingsProviderInterface;
use Limoncello\Contracts\Templates\TemplatesInterface;
use Limoncello\Templates\Contracts\TemplatesCacheInterface;
use Limoncello\Templates\TwigTemplates;
use Lolltec\Limoncello\Contracts\Templates\JsFrameworkTemplatesInterface;
use Lolltec\Limoncello\Templates\Contracts\JsFrameworkTemplatesCacheInterface;
use Lolltec\Limoncello\Templates\Package\JsFrameworkTemplatesSettings as C;
use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * @package Lolltec\Limoncello\Templates
 */
class JsFrameworkTemplatesContainerConfigurator implements ContainerConfiguratorInterface
{
    /** @var callable */
    const CONFIGURATOR = [self::class, self::CONTAINER_METHOD_NAME];

    /**
     * @inheritdoc
     */
    public static function configureContainer(LimoncelloContainerInterface $container): void
    {
        $container[JsFrameworkTemplatesInterface::class] = function (PsrContainerInterface $container): TemplatesInterface {
            $settings  = $container->get(SettingsProviderInterface::class)->get(C::class);
            $templates = new TwigTemplates(
                $settings[C::KEY_APP_ROOT_FOLDER],
                $settings[C::KEY_TEMPLATES_FOLDER],
                $settings[C::KEY_CACHE_FOLDER] ?? null,
                $settings[C::KEY_IS_DEBUG] ?? false,
                $settings[C::KEY_IS_AUTO_RELOAD] ?? false
            );

            return $templates;
        };

        $container[JsFrameworkTemplatesCacheInterface::class] =
            function (PsrContainerInterface $container): TemplatesCacheInterface {
                return $container->get(JsFrameworkTemplatesInterface::class);
            };
    }
}
