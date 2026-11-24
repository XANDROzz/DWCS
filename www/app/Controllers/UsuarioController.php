<?php
declare(strict_types=1);
namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\RolUsuarioModel;
use Com\Daw2\Models\TrabajadorModel;
use Com\Daw2\Models\UsuarioModel;

class UsuarioController extends BaseController {

    public function getUsuarios(){
        $data = array(
            'titulo' => 'Todos los Usuarios',
            'breadcrumb' => ['Inicio', 'Consultas simples'],
        );
        $model = new UsuarioModel();
        $data['usuarios'] = $model->getUserFilterBy($_GET);
        $data['order'] = $model->getOrderIndex($_GET);
        $data['currentPage'] = $model->getCurrentPage($_GET);
        $data['maxPage'] = $model->getLastPage($_GET);
        $rolUsuarioModel = new RolUsuarioModel();
        $data['roles'] = $rolUsuarioModel->getAll();
        $input = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['input'] = $input;
        $data['idiomas'] = $model->getLanguages();
        //No modificamos la superglobal, la copiamos en $getOrder
        $getOrder = $_GET;
        $data['baseUrl'] = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        unset($getOrder['order']);
        unset($getOrder['sentido']);
        $data['queryParams'] = http_build_query($getOrder);

        $getPage = $_GET;
        unset($getPage['page']);
        $data['queryParamsPage'] = http_build_query($getPage);
        $this->view->showViews(array('templates/header.view.php', 'querys/usuarios.view.php', 'templates/footer.view.php'), $data);
    }

    public function login(): void
    {
        $this->view->show('login.view.php');
    }
}