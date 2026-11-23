<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                     <input type="hidden" name="order" value="<?php echo $order; ?>"/>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                       value="<?php echo $input['nombre'] ?? ''; ?>"/>
                            </div>
                        </div>
                        <div class="col-2 col-lg-2">
                            <div class="form-group">
                                <label for="id_rol">Rol:</label>
                                <select name="id_rol" id="id_rol" class="form-control">
                                    <option value="">-</option>
                                    <?php foreach ($roles as $rol) {
                                        ?>
                                        <option value="<?php echo $rol['id_rol'] ?>" <?php echo (isset($input['id_rol']) && $rol['id_rol'] == $input['id_rol']) ? 'selected' : ''; ?>><?php echo ucfirst($rol['rol']); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p class="text-error small"><?php echo $errors['id_rol'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                           value="<?php echo $input['email'] ?? ''; ?>"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="date">Fecha:</label>
                                <input type="text" class="form-control" name="last_date" id="last_date"
                                       value="<?php echo $input['last_date'] ?? ''; ?>"/>
                            </div>
                        </div>
                        <div class="col-3 col-lg-2">
                            <div class="form-group">
                                <label for="idioma">Idioma:</label>
                                <select name="idioma" id="idioma" class="form-control">
                                    <option value="" <?php echo empty($input['idioma']) ? 'selected' : ''; ?>>
                                        -
                                    </option>
                                    <?php foreach ($idiomas as $idioma) {
                                        ?>
                                        <option value="<?php echo $idioma['idioma'] ?>" <?php echo (isset($input['idioma'])) ? 'selected' : ''; ?>><?php echo $idioma['idioma']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p class="text-error small"><?php echo $errors['idioma'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="<?php echo strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?>" value=""
                           class="btn btn-danger">Reiniciar filtros</a>
                        <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table id="tabladatos" class="table table-striped">
        <tr>
            <?php
            require_once '../app/Helpers/form_helper.php';
            echo printTableHeader(
                    ['Nombre', 'Rol', 'Email', 'Idioma', 'Fecha', 'Acciones'],
                    $order,
                    $input['sentido'] ?? null,
                    $queryParams
            );
            ?>
        <tbody>
            <?php
            foreach ($usuarios as $usuario) {
            ?>
        <tr class="<?php echo $usuario['baja'] ? 'table-danger' : ''; ?>">
            <td><?php echo $usuario['nombre'] ?></td>
            <td><?php echo $usuario['email'] ?></td>
            <td><?php echo $usuario['rol'] ?></td>
            <td><?php echo $usuario['last_date'] ?></td>
            <td><?php echo $usuario['idioma'] ?></td>
            <td>
                <a class="btn btn-success btn-sm">
                    <i class="fa-solid fas fa-edit"></i>
                </a>
                <a class="btn btn-primary btn-sm">
                    <i class="fa-solid fas fa-cannabis"></i>
                </a>
                <a class="btn btn-danger btn-sm">
                    <i class="fa-solid fas fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>