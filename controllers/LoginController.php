<?php 

namespace Controllers;

use Model\Usuario;
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
        
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario->sincronizar($_POST);

            $alertas = $usuario->validarNuevaCuenta();

            debuguear($alertas);
        }

        // Renderizar vista
        $router->render('auth/crear', [
            'titulo' => 'Crear tu cuenta en UpTask',
            'usuario' => $usuario
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

    public static function confirmar(Router $router) {
        // Renderizar vista
        $router->render('auth/confirmar', [
            'titulo' => 'Confirma tu cuenta UpTask'
        ]);
    }
}