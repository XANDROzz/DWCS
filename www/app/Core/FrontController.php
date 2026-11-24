<?php

namespace Com\Daw2\Core;

use Com\Daw2\Controllers\CategoriaController;
use Com\Daw2\Controllers\EjerciciosController;
use Com\Daw2\Controllers\PreferenciasController;
use Com\Daw2\Controllers\UsuarioSistemaController;
use Steampixel\Route;

class FrontController
{
    public static function main()
    {
        session_start();

        Route::add(
            '/',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->index();
            },
            'get'
        );
        Route::add(
            '/ejercicio1-strings',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio1Strings();

            },
            'get'
        );
        Route::add(
            '/ejercicio1-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio1operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio2-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio2operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio3-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio3operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio4-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio4operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio5-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio5operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio6-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio6operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio7-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio7operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio8-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio8operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio9-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio9operadores();

            },
            'get'
        );
        Route::add(
            '/ejercicio1-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio1estructuras();

            },
            'get'
        );
        Route::add(
            '/ejercicio2-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio2estructuras();

            },
            'get'
        );
        Route::add(
            '/ejercicio3-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio3estructuras();

            },
            'get'
        );
        Route::add(
            '/ejercicio4-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio4estructuras();

            },
            'get'
        );
        Route::add(
            '/ejercicio5-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio5estructuras();

            },
            'get'
        );
        Route::add(
            '/ejercicio6-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio6estructuras();

            },
            'get'
        );
        Route::add(
            '/ejercicio7-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio7estructuras();

            },
            'get'
        );
        Route::add(
            '/iterativas1',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio1();

            },
            'get'
        );

        Route::add(
            '/iterativas1',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio1();
            },
            'post'
        );

        Route::add(
            '/iterativas2',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio2();

            },
            'get'
        );

        Route::add(
            '/iterativas2',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio2();
            },
            'post'
        );

        Route::add(
            '/iterativas3',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio3();

            },
            'get'
        );

        Route::add(
            '/iterativas3',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio3();
            },
            'post'
        );

        Route::add(
            '/iterativas4',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio4();

            },
            'get'
        );

        Route::add(
            '/iterativas4',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio4();
            },
            'post'
        );

        Route::add(
            '/iterativas5',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio5();

            },
            'get'
        );

        Route::add(
            '/iterativas5',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio5();
            },
            'post'
        );

        Route::add(
            '/iterativas5',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio5();
            },
            'post'
        );

        Route::add(
            '/iterativas6',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio6();

            },
            'get'
        );

        Route::add(
            '/iterativas6',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio6();
            },
            'post'
        );

        Route::add(
            '/iterativas7',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio7();

            },
            'get'
        );

        Route::add(
            '/iterativas7',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio7();
            },
            'post'
        );

        Route::add(
            '/iterativas8',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio8();

            },
            'get'
        );

        Route::add(
            '/iterativas8',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio8();
            },
            'post'
        );

        Route::add(
            '/demo-proveedores',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->demo();
            },
            'get'
        );

        Route::add(
            '/ejercicio1-querys',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->ejercicio1();

            },
            'get'
        );

        Route::add(
            '/ejercicio2-querys',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->ejercicio2();

            },
            'get'
        );

        Route::add(
            '/ejercicio3-querys',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->ejercicio3();

            },
            'get'
        );

        Route::add(
            '/ejercicio4-querys',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->ejercicio4();

            },
            'get'
        );

        Route::add(
            '/todos-trabajadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->getAllTrabajadores();
            },
            'get'
        );
        Route::add(
            '/todos-trabajadores-ordenados',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->getAllTrabajadoresOrdenadosSalario();
            },
            'get'
        );
        Route::add(
            '/trabajadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->getTrabajadores();
            },
            'get'
        );
        Route::add(
            '/trabajadores/new',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->createTrabajador();
            },
            'get'
        );

        Route::add(
            '/trabajadores/new',
            function () {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->createTrabajador();
            },
            'post'
        );

        Route::add(
            '/trabajadores/edit/([a-zA-Z0-9_-]+)', function($username)
            {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->getTrabajadorToEdit($username);
            },
            'get'
        );

        Route::add(
            '/trabajadores/edit/([a-zA-Z0-9_-]+)', function($username)
            {
                $controlador = new \Com\Daw2\Controllers\TrabajadorController();
                $controlador->updateTrabajador($username);
            },
            'post'
        );

        Route::add(
            '/trabajadores/delete/([a-zA-Z0-9_-]+)', function($username)
        {
            $controlador = new \Com\Daw2\Controllers\TrabajadorController();
            $controlador->deleteTrabajador($username);
        },
            'get'
        );

        //Rutas para práctica de examen

        Route::add(
            '/trabajadores-practice',
            function()
        {
            $controller = new \Com\Daw2\Controllers\practicarexamen\TrabajadorPracController();
            $controller->getAllTrabajadores();

        },
            'get'
        );

        Route::add(
            '/cookies',
            function () {
                $controlador = new \Com\Daw2\Controllers\CookieController();
                $controlador->showTheme();
            },
            'get'
        );

        Route::add(
            '/cookies',
            function () {
                $controlador = new \Com\Daw2\Controllers\CookieController();
                $controlador-> saveTheme();
            },
            'post'
        );

        Route::add(
            '/usuarios',
            function () {
                $controlador = new \Com\Daw2\Controllers\UsuarioController();
                $controlador->getUsuarios();
            },
            'get'
        );

        Route::add(
            '/login',
            function () {
                $controlador = new \Com\Daw2\Controllers\UsuarioController();
                $controlador->login();
            },
            'get'
        );

        Route::pathNotFound(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error404();
            }
        );
        Route::methodNotAllowed(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error405();
            }
        );
        Route::run();
    }
}
