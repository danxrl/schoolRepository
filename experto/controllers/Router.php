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
                elseif ($_POST['r'] == 'crear-atomo') $controller->load_view('crear-atomo');
                elseif ($_POST['r'] == 'lista-de-atomos') $controller->load_view('lista-de-atomos');
                break;

            case 'reglas':
                if (!isset($_POST['r'])) $controller->load_view('reglas');
                elseif ($_POST['r'] == 'crear-regla') $controller->load_view('crear-regla');
                elseif ($_POST['r'] == 'lista-de-reglas') $controller->load_view('lista-de-reglas');
                break;

            default:
                $controller->load_view('error404');
                break;
        }
    }
}