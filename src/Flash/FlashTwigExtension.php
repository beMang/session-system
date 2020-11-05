<?php

namespace bemang\Session\Flash;

use bemang\Session\Flash\FlashService;
use Twig\Extension\AbstractExtension;
use Twig\Twig_SimpleFunction;

/**
 * Class pour utiliser le flash avec l'extension twig
 */
class FlashTwigExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('getFlash', [$this, 'getFlash'], ['is_safe' => ['html']])
        ];
    }

    public function getFlash(FlashService $service, string $name)
    {
        return $service->get($name);
    }
}
