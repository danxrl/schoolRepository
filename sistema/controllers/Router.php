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

            case 'almacen':
                if (!isset($_POST['r'])) $controller->load_view('almacen');
                elseif ($_POST['r'] == 'almacen-add') $controller->load_view('almacen-add');
                elseif ($_POST['r'] == 'almacen-edit') $controller->load_view('almacen-edit');
                elseif ($_POST['r'] == 'almacen-delete') $controller->load_view('almacen-delete');
                break;

            case 'cliente':
                if (!isset($_POST['r'])) $controller->load_view('cliente');
                elseif ($_POST['r'] == 'cliente-add') $controller->load_view('cliente-add');
                elseif ($_POST['r'] == 'cliente-edit') $controller->load_view('cliente-edit');
                elseif ($_POST['r'] == 'cliente-delete') $controller->load_view('cliente-delete');
                break;

            case 'inventario':
                if (!isset($_POST['r'])) $controller->load_view('inventario');
                elseif ($_POST['r'] == 'inventario-in') $controller->load_view('inventario-in');
                elseif ($_POST['r'] == 'inventario-out') $controller->load_view('inventario-out');
                elseif ($_POST['r'] == 'inventario-all') $controller->load_view('inventario-all');
                break;

            case 'material':
                if (!isset($_POST['r'])) $controller->load_view('material');
                elseif ($_POST['r'] == 'material-add') $controller->load_view('material-add');
                elseif ($_POST['r'] == 'material-edit') $controller->load_view('material-edit');
                elseif ($_POST['r'] == 'material-delete') $controller->load_view('material-delete');
                break;
            
            case 'pedido':
                if (!isset($_POST['r'])) $controller->load_view('pedido');
                elseif ($_POST['r'] == 'pedido-add') $controller->load_view('pedido-add');
                elseif ($_POST['r'] == 'pedido-edit') $controller->load_view('pedido-edit');
                elseif ($_POST['r'] == 'partida') $controller->load_view('partida');
                elseif ($_POST['r'] == 'partida-add') $controller->load_view('partida-add');
                elseif ($_POST['r'] == 'partida-edit') $controller->load_view('partida-edit');
                elseif ($_POST['r'] == 'partida-delete') $controller->load_view('partida-delete');
                break;

            case 'transporte':
                if (!isset($_POST['r'])) $controller->load_view('transporte');
                elseif ($_POST['r'] == 'transporte-add') $controller->load_view('transporte-add');
                elseif ($_POST['r'] == 'transporte-edit') $controller->load_view('transporte-edit');
                elseif ($_POST['r'] == 'transporte-delete') $controller->load_view('transporte-delete');
                break;

            case 'pre':
                $controller->load_preview('viewsChino/buscador');
                break;

            default:
                $controller->load_view('error404');
                break;
        }
    }
}