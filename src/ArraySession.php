<?php

namespace bemang\Session;

use bemang\Session\SessionInterface;
use bemang\Session\Exception\SessionException;

/**
 * Gère une session
 * @see SessionInterface
 */
class ArraySession implements SessionInterface
{
    /**
     * Référence de la session à manipuler
     *
     * @var array
     */
    protected $arraySession = [];

    /**
     * Initialise la sesion avec un tableau passé par référence
     *
     * @param array $session
     */
    public function __construct(array &$session)
    {
        $this->arraySession = &$session;
    }

    public function set(string $key, $value) :bool
    {
        $this->ensureStarted();
        if ($this->keyIsValid($key)) {
            $this->arraySession[$key] = $value;
            return true;
        } else {
            throw new SessionException('La clé est invalide');
            return false;
        }
    }
    
    public function get(string $key, $default = null)
    {
        $this->ensureStarted();
        if ($this->keyIsValid($key)) {
            if ($this->has($key)) {
                return $this->arraySession[$key];
            } else {
                return $default;
            }
        } else {
            throw new SessionException('La clé est invalide');
            return $default;
        }
    }

    public function delete(string $key) :bool
    {
        $this->ensureStarted();
        if ($this->keyIsValid($key)) {
            if ($this->has($key)) {
                unset($this->arraySession[$key]);
                return true;
            } else {
                return false;
            }
        } else {
            throw new SessionException('La clé est invalide');
            return false;
        }
    }

    public function has(string $key) :bool
    {
        $this->ensureStarted();
        if ($this->keyIsValid($key)) {
            if (isset($this->arraySession[$key]) && !empty($this->arraySession[$key])) {
                return true;
            } else {
                return false;
            }
        } else {
            throw new SessionException('La clé est invalide');
            return false;
        }
    }

    /**
     * Vérifie qu'une clé est valide
     *
     * @param string $key
     * @return boolean
     */
    protected function keyIsValid(string $key) :bool
    {
        if (empty($key)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Vérifie l'état de la session
     *
     * @return void
     */
    protected function ensureStarted() :void
    {
        if (!is_array($this->arraySession)) {
            $this->arraySession = [];
        }
    }
}
