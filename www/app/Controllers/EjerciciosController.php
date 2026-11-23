<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class EjerciciosController extends \Com\Daw2\Core\BaseController
{
    public function ejercicio1strings(): void
    {
        $data = array(
            'titulo' => 'Ejercicio Strings',
            'breadcrumb' => ['Inicio', 'Ejercicio Strings'],
            //'variableNueva' => 'Tengo valor'
        );
        $s = 'Carmiña';
        $final = '_user';
        $comillasDobles = "{$s}_user";
        $comillasSimples = $s . '_user'; //rafa_user

        $data['comillasSimples'] = $comillasSimples;
        $data['comillasDobles'] = $comillasDobles;
        $data['s'] = $s;
        $data['final'] = $final;
        $this->addNumbers(1,2);
        $this->addNumbers(2,3, 4);
        $this->addNumbers(a:5, b:6, d: '8');


        $this->view->showViews(array('templates/header.view.php', 'ejercicios1-strings.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio1operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        //ej1
        $x = 100;
        $cuadrado = $x**2;
        $data['x'] = $x;
        $data['cuadrado'] = $cuadrado;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio1-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio2operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $hPrice = 9;
        $hWorked = 40;
        $hToBePaid = $hPrice*$hWorked;
        $data['hPrice'] = $hPrice;
        $data['hWorked'] = $hWorked;
        $data['hToBePaid'] = $hToBePaid;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio2-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio3operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $rectangleB = 12;
        $rectangleH = 8;
        $rectanglePerimeter = 2*($rectangleH+$rectangleB);
        $rectangleArea = $rectangleB*$rectangleH;
        $data['rectangleB'] = $rectangleB;
        $data['rectangleH'] = $rectangleH;
        $data['rectanglePerimeter'] = $rectanglePerimeter;
        $data['rectangleArea'] = $rectangleArea;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio3-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio4operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $studentName = 'Josema';
        $studentAge = 18;
        $studentAvgMark = 5;
        $data['studentName'] = $studentName;
        $data['studentAge'] = $studentAge;
        $data['studentAvgMark'] = $studentAvgMark;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio4-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio5operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $priceNightHighSeason = 52;
        $priceNightLowSeason = 38;
        $numberOfNightsHighSeason = 3;
        $numberOfNightsLowSeason = 4;
        $priceToBePaidHighSeason = $priceNightHighSeason*$numberOfNightsHighSeason;
        $priceToBePaidLowSeason = $priceNightLowSeason*$numberOfNightsLowSeason;
        $data['priceToBePaidHighSeason'] = $priceToBePaidHighSeason;
        $data['priceToBePaidLowSeason'] = $priceToBePaidLowSeason;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio5-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio6operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $circleRadius = 7;
        $circlePerimeter = round(2*$circleRadius*pi(), 2);
        $circleArea = round(pi()*($circleRadius**2), 2);
        $data['circleRadius'] = $circleRadius;
        $data['circlePerimeter'] = $circlePerimeter;
        $data['circleArea'] = $circleArea;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio6-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio7operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $kmAnHour = 100;
        $mPerSecond = round(($kmAnHour*1000)/3600, 2);
        $data['kmAnHour'] = $kmAnHour;
        $data['mPerSecond'] = $mPerSecond;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio7-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio8operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $wholeNumber = 243;
        $numberString = (string)$wholeNumber;
        $firstNumber = $numberString[0];
        $secondNumber = $numberString[1];
        $thirdNumber = $numberString[2];
        $data['wholeNumber'] = $wholeNumber;
        $data['firstNumber'] = $firstNumber;
        $data['secondNumber'] = $secondNumber;
        $data['thirdNumber'] = $thirdNumber;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio8-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio9operadores(): void
    {
        $data = array(
            'titulo' => 'Ejercicios operadores',
            'breadcrumb' => ['Inicio', 'Ejercicios operadores'],
            //'variableNueva' => 'Tengo valor'
        );
        $string = "soy un string de 43 caracteres y 7 palabras";
        $stringNumberOfCaracters = strlen($string);
        $stringNumberOfWords = str_word_count($string);
        $data['string'] = $string;
        $data['stringNumberOfCaracters'] = $stringNumberOfCaracters;
        $data['stringNumberOfWords'] = $stringNumberOfWords;

        $this->view->showViews(array('templates/header.view.php', 'operadores/ejercicio9-operadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio1estructuras(): Boolean
    {
        $data = array(
            'titulo' => 'Ejercicios Estructuras',
            'breadcrumb' => ['Inicio', 'Ejercicios Estructuras'],
            //'variableNueva' => 'Tengo valor'
        );
        $num1 = 4;
        $num2 = 2;
        $data['num1'] = $num1;
        $data['num2'] = $num2;

        $this->view->showViews(array('templates/header.view.php', 'estructuras/ejercicio1-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio2estructuras(): void
    {
        $data = array(
            'titulo' => 'Ejercicios Estructuras',
            'breadcrumb' => ['Inicio', 'Ejercicios Estructuras'],
            //'variableNueva' => 'Tengo valor'
        );
        $num1 = 12;
        $num2 = 2324;
        $num3 = -24;
        $greaterNumber = 0;
        $data['num1'] = $num1;
        $data['num2'] = $num2;
        $data['num3'] = $num3;

        if($num1 > $num2 && $num1 > $num3){
            $greaterNumber = $num1;
        } elseif($num2 > $num3){
            $greaterNumber = $num2;
        } elseif($num2 < $num3){
            $greaterNumber = $num3;
        }
        $data['greaterNumber'] = $greaterNumber;

        $this->view->showViews(array('templates/header.view.php', 'estructuras/ejercicio2-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio3estructuras(): void
    {
        $data = array(
            'titulo' => 'Ejercicios Estructuras',
            'breadcrumb' => ['Inicio', 'Ejercicios Estructuras'],
            //'variableNueva' => 'Tengo valor'
        );
        $secsToBeTransformed = 8419398;
        $data['secsToBeTransformed'] = $secsToBeTransformed;
        $days = $secsToBeTransformed / 86400;
        $hours = ($secsToBeTransformed % 86400) / 3600;
        $mins = (($secsToBeTransformed % 86400) % 3600) / 60;
        $secs = (($secsToBeTransformed % 86400) % 3600) % 60;
        $data['days'] = $days;
        $data['hours'] = $hours;
        $data['mins'] = $mins;
        $data['secs'] = $secs;


        $this->view->showViews(array('templates/header.view.php', 'estructuras/ejercicio3-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio4estructuras(): void
    {
        $data = array(
            'titulo' => 'Ejercicios Estructuras',
            'breadcrumb' => ['Inicio', 'Ejercicios Estructuras'],
            //'variableNueva' => 'Tengo valor'
        );
        $year = 2028;
        $data['year'] = $year;
        $result = "";
        if($year % 4 === 0 && $year % 100 !== 0 || $year % 400 === 0){
            $result = "success";
        } else{
            $result = "danger";
        }
        $data['result'] = $result;

        $this->view->showViews(array('templates/header.view.php', 'estructuras/ejercicio4-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio5estructuras(): void
    {
        $data = array(
            'titulo' => 'Ejercicios Estructuras',
            'breadcrumb' => ['Inicio', 'Ejercicios Estructuras'],
            //'variableNueva' => 'Tengo valor'
        );
        $salary = 3000;
        $data['salary'] = $salary;
        $finalSalary = 0;
        $totalDiscount = 0;
        if($salary <= 1000){
            $totalDiscount = $salary * 10/100;
            $finalSalary = $salary - $totalDiscount;
        } elseif($salary > 1000 && $salary <= 2000){
            $extra = $salary - 1000;
            $salary = 1000;
            $totalDiscount = ($salary*10)/100 + ($extra*15)/100;
            $finalSalary = $salary + $extra - $totalDiscount;
        } elseif($salary > 2000){
            $extra2 = $salary - 2000;
            $salary = 1000;
            $extra = 1000;
            $totalDiscount = ($salary*10)/100 + ($extra*15)/100 + ($extra2*18)/100;
            $finalSalary = $salary + $extra + $extra2 - $totalDiscount;
        }
        $data['finalSalary'] = $finalSalary;
        $data['totalDiscount'] = $totalDiscount;


        $this->view->showViews(array('templates/header.view.php', 'estructuras/ejercicio5-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio6estructuras(): void
    {
        $data = array(
            'titulo' => 'Ejercicios Estructuras',
            'breadcrumb' => ['Inicio', 'Ejercicios Estructuras'],
            //'variableNueva' => 'Tengo valor'
        );

        $this->view->showViews(array('templates/header.view.php', 'estructuras/ejercicio6-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio7estructuras(): void
    {
        $data = array(
            'titulo' => 'Ejercicios Estructuras',
            'breadcrumb' => ['Inicio', 'Ejercicios Estructuras'],
            //'variableNueva' => 'Tengo valor'
        );

        $this->view->showViews(array('templates/header.view.php', 'estructuras/ejercicio7-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    function addNumbers(int|float $a, int|float $b, int|float $c = 0, int|float|string $d = 0): int|false
    {
        return $a + $b + $c + $d;
    }

    function getFechaNacimiento(Persona $p) :Date {

    }

}
