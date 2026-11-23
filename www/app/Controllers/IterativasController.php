<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class IterativasController extends BaseController
{
    public function ejercicio1(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas1.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio1(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $numeros = $_POST['numeros'];
        $check = $this->checkEjercicio1($numeros);
        if ($check === true) {
            $arrayNumero = explode(',', $numeros);
            $data['mayor'] = max($arrayNumero);
            $data['menor'] = min($arrayNumero);
            $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas1.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['error'] = $check;
            $data['numeros'] = filter_var($numeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas1.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkEjercicio1(string $numeros): string | true
    {
        if ($numeros === '') {
            return 'Debe ingresar numeros';
        }
        $arrayNumero = explode(',', $numeros);

        foreach ($arrayNumero as $numero) {
            if (!is_numeric($numero)) {
                return 'Debe ingresar numeros separados por comas';
            }
        }
        return true;
    }

    public function ejercicio2(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas2.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio2(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $numeros = $_POST['numeros'];

        $check = $this->checkEjercicio2($numeros);
        if ($check === true) {
            $arrayNumero = explode(',', $numeros);
            sort($arrayNumero);
            $arrayNumero = implode(',', $arrayNumero);
            $data['arrayNumero'] = $arrayNumero;

            $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas2.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['error'] = $check;
            $data['numeros'] = filter_var($numeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas2.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkEjercicio2(string $numeros): string | true
    {
        if ($numeros === '') {
            return 'Debe ingresar numeros';
        }
        $arrayNumero = explode(',', $numeros);

        foreach ($arrayNumero as $numero) {
            if (!is_numeric($numero)) {
                return 'Debe ingresar numeros separados por comas';
            }
        }
        return true;
    }

    public function ejercicio3(string $numeros = '', array $errores = [], array $resultado = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar matriz'],
        );
        $data['errores'] = $errores;
        $data['numeros'] = $numeros;
        $data['resultado'] = $resultado;
        $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas3.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio3(): void
    {
        $errores = $this->checkEjercicio3($_POST);
        $inputNumeros = filter_var($_POST['numeros'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($errores === []) {
            //Hacemos el trabajo
            $aux = explode('|', $_POST['numeros']);

            $numeros = [];
            foreach ($aux as $ns) {
                $arrayNumeros = explode(',', $ns);
                if(!isset($numColumnas)) {
                    $numColumnas = count($arrayNumeros);
                }
                $numeros = array_merge($numeros, $arrayNumeros);
            }
            sort($numeros);
            $matriz = $this->montarMatriz($numeros, $numColumnas);
            $this->ejercicio3($inputNumeros, [], $matriz);

        } else {
            $this->ejercicio3($inputNumeros, $errores);
        }
    }

    private function montarMatriz(array $plano, int $numColumnas): array
    {
        $matriz = [];
        $aux = [];
        foreach($plano as $numero) {
            $aux[] = $numero;
            if (count($aux) === $numColumnas) {
                $matriz[] = $aux;
                $aux = [];
            }
        }
        return $matriz;
    }

    private function checkEjercicio3(array $data): array
    {
        $errores = [];
        if (empty($data['numeros'])) {
            $errores['numeros'] = 'Campo obligatorio';
        } else {
            $aux = explode('|', $data['numeros']);
            //Primero comprobamos que todas las filas tengan el mismo número de elementos
            foreach ($aux as $array) {
                if (!isset($numColumnas)) {
                    $numColumnas = count(explode(',', $array));
                } else if ($numColumnas !== count(explode(',', $array))) {
                    $errores['numeros'] = 'Las filas deben tener el mismo número de columnas.';
                }
            }
            $numeros = [];
            //Aplanamos y comprobamos que son números
            foreach ($aux as $ns) {
                $numeros = array_merge($numeros,  explode(',', $ns));
            }
            foreach ($numeros as $numero) {
                if (!is_numeric($numero)) {
                    $errores['numeros'] = "El valor '$numero' no es un número";
                }
            }
        }
        return $errores;
    }

    public function ejercicio4(array $array = [], bool $err = false): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'numero letras'],
        );

        $data['charArray'] = $array;
        $data['err'] = $err;
        $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas4.view.php', 'templates/footer.view.php'), $data);

    }

    public function doEjercicio4(): void
    {
        $string = $_POST['string'];
        $string = mb_strtolower($string);
        $err = false;
        $pattern = '/[^\p{L}]/u';
        $string = preg_replace($pattern, '', $string);
        $charArray = [];
        if($string == ''){
            $err = true;
        }
        foreach (str_split($string) as $char) {
            if (!isset($charArray[$char])) {
                $charArray[$char] = 0;
            }
            $charArray[$char]++;
        }
        arsort($charArray);
        $this->ejercicio4($charArray, $err);

    }

    public function ejercicio5(array $array = [], bool $err = false): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );

        $data['wordArray'] = $array;
        $data['err'] = $err;
        $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas5.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio5(): void
    {
        // Captura segura del POST
        $string = $_POST['string'] ?? '';
        $err = false;

        $string = mb_strtolower($string);
        $string = preg_replace('/[^\p{L}]/u', ' ', $string);
        $string = trim($string);

        $wordArray = [];

        if ($string === '') {
            $err = true;
        } else {
            $words = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

            foreach ($words as $word) {
                if (!isset($wordArray[$word])) {
                    $wordArray[$word] = 0;
                }
                $wordArray[$word]++;
            }
            arsort($wordArray);
        }

        $this->ejercicio5($wordArray, $err);
    }


    public function ejercicio8(string $json = '', array $errores = [], array $resultado = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Cálculo de notas'],
        );
        $data['errores'] = $errores;
        $data['json'] = $json;
        $data['resultado'] = $resultado;
        $this->view->showViews(array('templates/header.view.php', 'iterativas/iterativas8.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio8(): void
    {
        $json = $_POST['json'] ?? '';
        $errores = $this->checkEjercicio8($json);
        if ($errores === []) {
            $resultado = $this->procesarEjercicio8(json_decode($json, true));
            $this->ejercicio8(filter_var($json, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $resultado);
        } else {
            $this->ejercicio8(filter_var($json, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
    }

    private function procesarEjercicio8(array $datos): array
    {
        $resultado = [];
        $suspensosPorAlumno = [];
        $todosLosAlumnos = [];
        $numAlumnos = 0;
        $alumnosAprobados = 0;
        $alumnosSuspensos = 0;
        $repetidores = 0;
        foreach ($datos as $asignatura => $alumnos) {
            $datosAsignatura = [
                'media' => 0,
                'suspensos' => 0,
                'aprobados' => 0,
                'max' => [
                    'alumno' => null,
                    'nota' => null
                ],
                'min' => [
                    'alumno' => null,
                    'nota' => null
                ]
            ];
            $numAlumnos = count($alumnos);
            $notaAgregada = 0;
            foreach ($alumnos as $nombre => $nota) {
                $todosLosAlumnos[$nombre] = true;
                $notaAgregada += $nota;
                if ($nota >= 5) {
                    $datosAsignatura['aprobados']++;
                } else {
                    $datosAsignatura['suspensos']++;
                    if (!isset($suspensosPorAlumno[$nombre])) {
                        $suspensosPorAlumno[$nombre] = 0;
                    }
                    $suspensosPorAlumno[$nombre]++;
                }
                    //Sólo se va a ejecutar para el primer alumno de cada asignatura
                    if ($datosAsignatura['max']['alumno'] === null) {
                        $datosAsignatura['max']['alumno'] = $nombre;
                        $datosAsignatura['max']['nota'] = $nota;
                        $datosAsignatura['min']['alumno'] = $nombre;
                        $datosAsignatura['min']['nota'] = $nota;
                    } else {
                        if ($datosAsignatura['max']['nota'] < $nota) {
                            $datosAsignatura['max']['alumno'] = $nombre;
                            $datosAsignatura['max']['nota'] = $nota;
                        }
                        if ($datosAsignatura['min']['nota'] > $nota) {
                            $datosAsignatura['min']['alumno'] = $nombre;
                            $datosAsignatura['min']['nota'] = $nota;
                        }
                    }
                }

                $datosAsignatura['media'] = ($numAlumnos > 0) ? $notaAgregada / $numAlumnos : null;
                $resultado[$asignatura] = $datosAsignatura;
            }
            foreach ($suspensosPorAlumno as $nombre => $suspensos) {
                if($suspensos === 1){
                    $alumnosSuspensos++;
                } else {
                    $repetidores++;
                }
            }
            $totalAlumnos = count($todosLosAlumnos);
            $alumnosAprobados = $totalAlumnos - (count($suspensosPorAlumno));
            $resultado['alumnosAprobados'] = $alumnosAprobados;
            $resultado['alumnosSuspensos'] = $alumnosSuspensos;
            $resultado['repetidores'] = $repetidores;
            $resultado['suspensosPorAlumno'] = $suspensosPorAlumno;
            $resultado['todosLosAlumnos'] = array_keys($todosLosAlumnos);
            return $resultado;
        }

    private function checkEjercicio8(string $json)
    {
        $errores = [];
        if ($json === '') {
            $errores['json'][] = 'Campo obligatorio';
        } else {
            if (json_validate($json)) {
                $datos = json_decode($json, true);
                if (is_array($datos)) {
                    foreach($datos as $asignatura => $alumnos) {
                        if (!is_string($asignatura)) {
                            $errores['json'][] = "El valor $asignatura no es una string";
                        } else {
                            if (!is_array($alumnos)) {
                                $errores['json'][] = "No tenemos un array de alumnos en la asignatura: $asignatura ";
                            } else {
                                foreach($alumnos as $nombre => $nota) {
                                    if (!is_string($nombre)) {
                                        $errores['json'][] = "En la asignatura $asignatura existe un alumno cuyo nombre no es una string";
                                    } elseif (!is_numeric($nota)) {
                                        $errores['json'][] = "En la asignatura $asignatura, el alumno $nombre no tiene una nota numérica";
                                    } elseif ($nota > 10 || $nota < 0) {
                                        $errores['json'][] = "En la asignatura $asignatura, el alumno $nombre no tiene una nota entre 0 y 10";
                                    }
                                }
                            }
                        }
                    }
                } else{
                    $errores['json'][] = 'El json no tiene el formato esperado';
                }
            } else {
                $errores['json'][] = 'Inserte un json válido';
            }
        }
        return $errores;
    }

}


