<?php
declare(strict_types=1);
namespace Com\Daw2\Controllers\practicarexamen;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\practicarexamen\AuxRolTrabajadorPracModel;
use Com\Daw2\Models\practicarexamen\AuxCountriesPracModel;
use Com\Daw2\Models\practicarexamen\TrabajadorPracModel;

class TrabajadorPracController extends BaseController
{
    public function getAllTrabajadores(): void
    {
        $data = array(
          'titulo' => 'Todos los trabajadores',
          'breadcrumb' => ['Inicio', 'Consultas simples'],
        );

        $model = new TrabajadorPracModel();
        $auxRolEmpleadoModel = new AuxRolTrabajadorPracModel();
        $auxCountriesPracModel = new AuxCountriesPracModel();
        $data['emproles'] = $auxRolEmpleadoModel->getRoles();
        $data['empcountries'] = $auxCountriesPracModel->getCountries();
        $data['empleados'] = $model->getTrabajadorByFilter($_GET);
        $input = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['input'] = $input;

        $data['baseUrl'] = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');

        $getOrder = $_GET;
        unset($getOrder['order']);
        $queryParams = http_build_query($getOrder);
        $extra = $queryParams !== '' ? '&' . $queryParams : '';
        $data['extra'] = $extra;
        $data['nextOrders'] = $nextOrders = [
            'nombre'    => $model->getNextOrder(1, $_GET),
            'rol'       => $model->getNextOrder(2, $_GET),
            'salario'   => $model->getNextOrder(3, $_GET),
            'retencion' => $model->getNextOrder(4, $_GET),
            'pais'      => $model->getNextOrder(5, $_GET),
        ];

        $data['curPage'] = $model->getCurrentPage($_GET);
        $data['mxPage'] = $model->getLastPage();
        $getPage = $_GET;
        unset($getPage['page']);
        $data['queryParamsPage'] = http_build_query($getPage);

        $this->view->showViews(array('templates/header.view.php', 'practicarexamen/trabajadoresPrac.view.php', 'templates/footer.view.php'), $data);
    }

    public function createTrabajador(): void
    {
        $data = array(
            'titulo' => 'Crear trabajador',
            'breadcrumb' => ['Inicio', 'Consultas simples'],
        );
        $empErrors = [];

        $model = new TrabajadorPracModel();
        $auxRolEmpleadoModel = new AuxRolTrabajadorPracModel();
        $auxCountriesPracModel = new AuxCountriesPracModel();
        $data['emproles'] = $auxRolEmpleadoModel->getRoles();
        $data['empcountries'] = $auxCountriesPracModel->getCountries();
        $data['empInput'] = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $empErrors = $this->checkNewTrabajador($_POST);
            if(empty($empErrors)){
                $model->newTrabajador($_POST);
                header('Location: http://localhost:8080/trabajadores-practice');
                exit();
            }
        }
        $data['empErrors'] = $empErrors;

        $this->view->showViews(array('templates/header.view.php', 'practicarexamen/trabajadoresPracCreate.view.php', 'templates/footer.view.php'), $data);
    }

    public function checkNewTrabajador(array $data): array
    {
        $empErrors = [];
        if (empty($data['username'])) {
            $empErrors['username'] = 'El username es un campo obligatorio';
        }elseif (preg_match('/\d/', $data['username'])) {
            $empErrors['username'] = 'El username no puede contener números';
        }
        if (empty($data['salarioBruto'])) {
            $empErrors['salarioBruto'] = 'El salario es un campo obligatorio';
        }elseif (!is_numeric($data['salarioBruto'])) {
            $empErrors['salarioBruto'] = 'El salario bruto debe ser un numero';
        }
        if (empty($data['retencionIRPF'])) {
            $empErrors['retencionIRPF'] = 'El nombre es un campo obligatorio';
        }elseif (!is_numeric($data['retencionIRPF'])) {
            $empErrors['retencionIRPF'] = 'El nombre es un campo obligatorio';
        }
        if (empty($data['id_rol'])) {
            $empErrors['id_rol'] = 'El rol es un campo obligatorio';
        }
        if (empty($data['id_country'])) {
            $empErrors['id_country'] = 'El país es un campo obligatorio';
        }
        return $empErrors;
    }

    public function getTrabajadorToEdit($username): void
    {
        $data = array(
            'titulo' => 'Listado trabajadores',
            'breadcrumb' => ['Inicio', 'Trabajadores','Editar Trabajador'],
        );

        $model = new TrabajadorPracModel();
        $auxTrabajadorRolModel = new AuxRolTrabajadorPracModel();
        $data['emproles'] = $auxTrabajadorRolModel->getRoles();
        $countriesModel = new AuxCountriesPracModel();
        $data['empcountries'] = $countriesModel->getCountries();
        $data['empleado'] = $model->getTrabajadorToEdit($username);

        $this->view->showViews(array('templates/header.view.php', 'practicarexamen/trabajadoresPracEdit.view.php', 'templates/footer.view.php'), $data);
    }

    public function updateTrabajador($username): void
    {
        $data = array(
            'titulo' => 'Listado trabajadores',
            'breadcrumb' => ['Inicio', 'Trabajadores','Editar Trabajador'],
        );

        $model = new TrabajadorPracModel();
        $empleado = $model->getTrabajadorToEdit($username);
        $camposForm=['username','salarioBruto','retencionIRPF','nombre_rol', 'country_name'];
        $cambios = [];
        foreach ($camposForm as $campo) {
            if (isset($_POST[$campo]) && $_POST[$campo] != $empleado[$campo]) {
                $cambios[$campo] = $_POST[$campo];
            }
        }
        if(!empty($cambios)){
            $data['empleado'] = $model->updateTrabajador($username, $cambios);
        }
        header('Location: /trabajadores-practice/');
        exit;
    }

    public function deleteTrabajador($username): void
    {
        $model = new TrabajadorPracModel();
        $empleado = $model->deleteTrabajador($username);
        header('Location: /trabajadores-practice/');
    }
}