<?php

declare(strict_types=1);
?>
<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Campos a llenar</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username"
                                       value="<?php echo $input['username'] ?? ''; ?>"
                                       placeholder="Josema"/>
                                <p class="text-danger small"><?php echo $errors['username'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label for="id_rol">Rol:</label>
                                <select name="id_rol" id="id_rol" class="form-control select2">
                                    <option value="" disabled selected>-</option>
                                    <?php foreach ($roles as $rol) {
                                        ?>
                                        <option value="<?php echo $rol['id_rol'] ?>" <?php echo (isset($input['id_rol']) && $rol['id_rol'] == $input['id_rol']) ? 'selected' : ''; ?>><?php echo ucfirst($rol['nombre_rol']); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p class="text-danger small"><?php echo $errors['id_rol'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label for="salarioBruto">Salario Bruto:</label>
                                <input type="text" class="form-control" name="salarioBruto"
                                       id="salarioBruto"
                                       value="<?php echo $input['salarioBruto'] ?? '' ?>"
                                       placeholder="1500"/>
                                <p class="text-danger small"><?php echo $errors['salarioBruto'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-3">
                                <label for="retencionIRPF">Retención:</label>
                                <input type="text" class="form-control" name="retencionIRPF"
                                       id="retencionIRPF"
                                       value="<?php echo $input['retencionIRPF'] ?? '' ?>"
                                       placeholder="30"/>
                                <p class="text-danger small"><?php echo $errors['retencionIRPF'] ?? ''; ?></p>
                            </div>

                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label for="id_country">País:</label>
                                <select name="id_country" id="id_country" class="form-control select2">
                                    <option value="" disabled selected>-</option>
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?php echo $country['id_country']; ?>"
                                                <?php echo (isset($input['id_country']) && $input['id_country'] == $country['id_country']) ? 'selected' : ''; ?>>
                                            <?php echo ucfirst($country['country_name']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger small"><?php echo $errors['id_country'] ?? ''; ?></p>
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