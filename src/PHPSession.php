<?php

namespace bemang\Session;

use bemang\Session\ArraySession;
use bemang\Session\SessionInterface;
use bemang\Session\Exception\SessionException;

/**
 * Class Session
 * Gestion des sessions simples
 * @see ArraySession
 */
class PHPSession extends ArraySession
{
    public function __construct()
    {
    }

    /**
     * Vérfie que la session est correctement lancée
     *
     * @return void
     */
    protected function ensureStarted() :void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->arraySession = &$_SESSION;
    }
}
