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
                    <h6 class="m-0 font-weight-bold text-primary">Campos a Modificar</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username"
                                       value="<?= htmlspecialchars($trabajador['username'] ?? ''); ?>">
                                <p class="text-danger small"><?php echo $errors['username'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label for="id_rol">Rol:</label>
                                <select name="id_rol" id="id_rol" class="form-control select2">
                                    <option value="" disabled>-</option>
                                    <?php foreach ($roles as $rol) {
                                        ?>
                                        <option value="<?= $rol['id_rol'] ?>" <?= (isset($trabajador['id_rol']) && $rol['id_rol'] == $trabajador['id_rol']) ? 'selected' : ''; ?>> <?= htmlspecialchars(ucfirst($rol['nombre_rol'])); ?> </option>
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
                                       value="<?= htmlspecialchars($trabajador['salarioBruto'] ?? '') ; ?>">
                                <p class="text-danger small"><?php echo $errors['salarioBruto'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-3">
                                <label for="retencionIRPF">Retención:</label>
                                <input type="text" class="form-control" name="retencionIRPF"
                                       id="retencionIRPF"
                                       value="<?= htmlspecialchars($trabajador['retencionIRPF' ] ?? ''); ?>">
                                <p class="text-danger small"><?php echo $errors['retencionIRPF'] ?? ''; ?></p>
                            </div>

                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label for="id_country">País:</label>
                                <select name="id_country" id="id_country" class="form-control select2">
                                    <option value="" disabled>-</option>
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?php echo $country['id_country']; ?>"
                                                <?php echo (isset($trabajador['id_country']) && $trabajador['id_country'] == $country['id_country']) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars(ucfirst($country['country_name']));?>
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
                        <a href="trabajadores/" value=""
                           class="btn btn-danger">Volver</a>
                        <input type="submit" value="Aplicar cambios" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>