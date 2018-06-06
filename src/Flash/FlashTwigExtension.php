<?php

namespace bemang\Session\Flash;

use bemang\Session\Flash\FlashService;

/**
 * Class pour utiliser le flash avec l'extension twig
 */
class FlashTwigExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('getFlash', [$this, 'getFlash'], ['is_safe' => ['html']])
        ];
    }

    public function getFlash(FlashService $service, string $name)
    {
        return $service->get($name);
    }
}
