<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?php echo $_ENV['host.folder'] ?>" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'inicio' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Inicio
                </p>
            </a>
        </li>
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item <?php echo (in_array($_SERVER['REQUEST_URI'], [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Panel de control
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo $_ENV['host.folder'] ?>demo-proveedores" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'demo-proveedores' ? 'active' : ''; ?>">
                        <i class="fas fa-laptop-code nav-icon"></i>
                        <p>Demo Proveedores</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item <?php echo (in_array($_SERVER['REQUEST_URI'], [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-code"></i>
                <p>
                    Ejercicios Operadores
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php for($i = 1 ; $i < 10 ; $i++):?>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>ejercicio<?php echo $i?>-operadores" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . "ejercicio{$i}-operadores" ? 'active' : ''; ?>">
                            <i class="fas fa-equals nav-icon"></i>
                            <p>Ejercicio <?php echo $i?></p>
                        </a>
                    </li>
                <?php endfor;?>
            </ul>
        </li>
        <li class="nav-item <?php echo (in_array($_SERVER['REQUEST_URI'], [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-code"></i>
                <p>
                    Ejercicios estructuras de decisión
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php for($i = 1 ; $i < 8 ; $i++):?>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>ejercicio<?php echo $i?>-estructuras" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . "ejercicio{$i}-estructuras" ? 'active' : ''; ?>">
                            <i class="fas fa-equals nav-icon"></i>
                            <p>Ejercicio <?php echo $i?></p>
                        </a>
                    </li>
                <?php endfor;?>
            </ul>
        </li>
        <li class="nav-item <?php echo (in_array($_SERVER['REQUEST_URI'], [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-code"></i>
                <p>
                    Ejercicios iterativas
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php for($i = 1 ; $i < 9 ; $i++):?>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>iterativas<?php echo $i?>" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . "iterativas{$i}" ? 'active' : ''; ?>">
                            <i class="fas fa-equals nav-icon"></i>
                            <p>Ejercicio <?php echo $i?></p>
                        </a>
                    </li>
                <?php endfor;?>
            </ul>
        </li>
        <li class="nav-item <?php echo (in_array($_SERVER['REQUEST_URI'], [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-code"></i>
                <p>
                    Ejercicios querys
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php for($i = 1 ; $i < 5 ; $i++):?>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>ejercicio<?php echo $i?>-querys" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . "query{$i}" ? 'active' : ''; ?>">
                            <i class="fas fa-equals nav-icon"></i>
                            <p>Ejercicio <?php echo $i?></p>
                        </a>
                    </li>
                <?php endfor;?>
                    <li>
                        <a href="<?php echo $_ENV['host.folder'] ?>trabajadores" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . "trabajadores" ? 'active' : ''; ?>">
                            <i class="fas fa-equals nav-icon"></i>
                            <p>Formulario de trabajadores con preparedStmnt</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $_ENV['host.folder'] ?>usuarios" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . "usuarios" ? 'active' : ''; ?>">
                            <i class="fas fa-equals nav-icon"></i>
                            <p>Formulario de Usuarios con preparedStmnt</p>
                        </a>
                    </li>

            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->