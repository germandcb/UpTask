<?php 

namespace Controllers;

use MVC\Router;
use Model\Proyecto;

class DashboardController {
    public static function index (Router $router) {
        session_start();

        isAuth();

        $alertas = [];

        $router->render('dashboard/index', [
            'titulo' => 'Proyectos', 
            'alertas' => $alertas
        ]);
    }

    public static function crear_proyecto(Router $router) {

        session_start();
        $alertas = [];
        
        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto($_POST);

            // Validación 
            $alertas = $proyecto->validarProyecto();

            if (empty($alertas)) {
                // Guardar proyecto
            }
        }
        
        $router->render('dashboard/crear-proyecto', [
            'titulo' => 'Crear Proyecto', 
            'alertas' => $alertas
        ]);
    }

    public static function perfil(Router $router) {

        session_start();
        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil'
        ]);
    }

}