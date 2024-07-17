<?php 

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Proyecto;

class DashboardController {
    public static function index (Router $router) {
        
        session_start();
        isAuth();

        $id = $_SESSION['id'];

        $proyectos = Proyecto::belongsTo('propietarioId', $id);

        $router->render('dashboard/index', [
            'titulo' => 'Proyectos',
            'proyectos' => $proyectos, 
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
                // Generar un URL única
                $hash = md5(uniqid());
                $proyecto->url = md5($hash);

                // Almacenar el creador del proyecto
                $proyecto->propietarioId = $_SESSION['id'];

                // Guardar proyecto
                $proyecto->guardar();

                // Redireccionar
                header('Location: /proyecto?id=' . $proyecto->url);
            }
        }
        
        $router->render('dashboard/crear-proyecto', [
            'titulo' => 'Crear Proyecto', 
            'alertas' => $alertas
        ]);
    }

    public static function proyecto(Router $router) {
        
        session_start();
        isAuth();

        $token = $_GET['id'];
        if (!$token) header('Location: /dashboard');

        // Revisar que la persona que visita el proyecto, es quien lo creo
        $proyecto = Proyecto::where('url', $token);

        if ($proyecto->propietarioId !== $_SESSION['id']) {
            header('Location: /dashboard');
        }

        $router->render('dashboard/proyecto', [
            'titulo' => $proyecto->proyecto
        ]);
    }

    public static function perfil(Router $router) {

        session_start();
        isAuth();
        $alertas = [];

        $usuario = Usuario::find($_SESSION['id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validarPerfil();

            if(empty($alertas)) {

                // Guardar el usuario
                $usuario->guardar();

                Usuario::setAlerta('exito', 'Guardado Correctamente');
                $alertas = $usuario->getAlertas();

                // Asignar el nuevo nombre a la barra
                $_SESSION['nombre'] = $usuario->nombre;
            }
        }

        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

}