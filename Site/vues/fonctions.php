<?php

/**
 * Fonctions liées à l'affichage
 */

/**
 * Génère le code HTML d'affichage d'une alerte
 * @param string|null $error
 */
function printError(string $error) {
    
    if(!is_null($error) && !empty($error)) {
        return "<p><strong><i> {$error}</i></strong></p> </br>";
    }
}
?>