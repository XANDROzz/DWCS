<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\CookieModel;

class CookieController extends BaseController
{
    public function showTheme(): void
    {
        $data = array(
            'title'=> 'guardar tema',
            'breadcrumb' => ['Inicio', 'cookies'],
        );

        $this->view->showViews(array('templates/header.view.php', 'cookies/cookies.view.php', 'templates/footer.view.php'), $data);
    }

    public function saveTheme(): void{

        $darkmode = !empty($_POST['tema']) && $_POST['tema'] == 'dark';
        setcookie('dark_mode', (string)$darkmode, time() + 2592000);
        $_COOKIE['dark_mode'] = $darkmode;
        $this->showTheme();

    }
}