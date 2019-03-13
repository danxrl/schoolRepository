<?php

class Router {
    // Atributos de la clase
    public $router;

    // Métodos de la clase
    public function __construct($router) {
        $this->route = isset($_GET['r']) ? $_GET['r'] : 'home';

        $controller = new ViewController();

        switch ($this->route) {
            case 'home':
                $controller->load_view('home');
                break;

            case 'atomos':
                if (!isset($_POST['r'])) $controller->load_view('atomos');
                elseif ($_POST['r'] == 'atomo-add') $controller->load_view('atomo-add');
                break;

            case 'reglas':
                if (!isset($_POST['r'])) $controller->load_view('reglas');
                elseif ($_POST['r'] == 'regla-add') $controller->load_view('regla-add');
                break;

            default:
                $controller->load_view('error404');
                break;
        }
    }
}