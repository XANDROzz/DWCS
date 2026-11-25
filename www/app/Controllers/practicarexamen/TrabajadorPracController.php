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

        $this->view->showViews(array('templates/header.view.php', 'querys/trabajadoresPrac.view.php', 'templates/footer.view.php'), $data);
    }

}