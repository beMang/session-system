<?php

namespace bemang\Session\Flash;

use bemang\Session\SessionInterface;

class FlashService
{
    const SESSION_KEY = 'bemang_flash';

    protected $session;

    protected $messages = [];

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function flash(string $name, string $message) :bool
    {
        if (!empty($message)) {
            if (!empty($name)) {
                $flash = $this->getSession()->get(self::SESSION_KEY);
                $flash[$name] = $message;
                return $this->getSession()->set(self::SESSION_KEY, $flash);
            } else {
                throw new \bemang\Session\Exception\FlashException("Le ne nom du flash peut pas être vide");
                return false;
            }
        } else {
            throw new \bemang\Session\Exception\FlashException("Le message ne peut pas être vide");
            return false;
        }
    }

    public function get(string $name) :?string
    {
        if (!isset($this->messages[$name])) {
            $flash = $this->getSession()->get(self::SESSION_KEY);
            if (isset($flash[$name])) {
                $this->messages[$name] = $flash[$name];
                unset($flash[$name]);
                $this->getSession()->set(self::SESSION_KEY, $flash);
                return $this->messages[$name];
            } else {
                return null;
            }
        } else {
            return $this->messages[$name];
        }
    }

    protected function getSession() :SessionInterface
    {
        return $this->session;
    }
}
