<?php

abstract class BaseController
{
    protected function render($view, $data = [])
    {
        extract($data);

        // Calculer le chemin absolu du fichier de vue
        $viewFile = __DIR__ . "/../views/$view.php";

        // Répertoire racine des vues
        $viewsRoot = __DIR__ . "/../views";

        // Sauvegarder le répertoire courant et basculer dans la racine des vues
        $oldCwd = getcwd();
        chdir($viewsRoot);

        require $viewFile;

        // Restaurer le répertoire courant
        chdir($oldCwd);
    }
}
