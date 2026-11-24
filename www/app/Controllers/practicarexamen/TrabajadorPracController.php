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


        $this->view->showViews(array('templates/header.view.php', 'querys/trabajadoresPrac.view.php', 'templates/footer.view.php'), $data);
    }
}