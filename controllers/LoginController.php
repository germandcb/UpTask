<?php 

namespace Controllers;

use MVC\Router;

class LoginController {
    public static function login(Router $router) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        // Renderizar vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout() {
        echo "Desde Login";
    }

    public static function crear(Router $router) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        // Renderizar vista
        $router->render('auth/crear', [
            'titulo' => 'Crear tu cuenta en UpTask'
        ]);
    }

    public static function olvide(Router $router) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        // Renderizar vista
        $router->render('auth/olvide', [
            'titulo' => 'Olvide mi password'
        ]);
    }

    public static function reestablecer(Router $router) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        // Renderizar vista
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Password'
        ]);
    }

    public static function mensaje(Router $router) {
        // Renderizar vista
        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }

    public static function confirmar() {
        echo "Desde Confirmar";
    }
}