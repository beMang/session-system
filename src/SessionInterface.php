<?php

namespace bemang\Session;

interface SessionInterface
{
    /**
     * Défini une clé dans la session
     *
     * @param string $key Clé à définir
     * @param mixin $value Valeur de la clé
     * @return boolean Résultat
     */
    public function set(string $key, $value) :bool;

    /**
     * Récupère une clé dans la session
     *
     * @param string $key Clé à récupérer
     * @param mixin $default Valeur par défaut si échec
     * @return void
     */
    public function get(string $key, $default = null);

    /**
     * Vérfie si une clé existe
     *
     * @param string $key Clé à vérifier
     * @return boolean
     */
    public function has(string $key) :bool;

    /**
     * Supprime une clé de la session
     *
     * @param string $key Clé à supprimer
     * @return boolean Résultat
     */
    public function delete(string $key) :bool;
}
