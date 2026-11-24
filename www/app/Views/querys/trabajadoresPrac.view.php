<?php

declare(strict_types=1);

?>

<!-- Inicio de mi html -->
<div class="row">
    <div class="col-12">
        <!-- Tarjeta form -->
        <div class="card shadow mb-4">
            <form method="get" action="">
                <!-- Card header -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="font-weight-bold text-primary">Búsqueda trabajadores</h6>

                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label for="id_rol">Rol:</label>
                                <select class="form-control select2" name="id_rol" id="id_rol">
                                    <option value="" disabled selected>-</option>
                                    <?php foreach($emproles as $rol):  ?>
                                    <option value="<?= $rol['id_rol']?>" <?= (isset($input['id_rol']) && $rol['id_rol'] === (int)$input['id_rol']) ? 'selected' : '' ?>>
                                        <?= ucfirst($rol['nombre_rol']) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label for="salarioBruto">Salario Bruto:</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="salarioBrutoMin" id="salarioBrutoMin"
                                           value="" placeholder="Mínimo">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="salarioBrutoMax" id="salarioBrutoMax"
                                           value="" placeholder="Máximo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <label for="retencionIRPF">Retención:</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="retencionIRPFMin" id="retencionIRPFMin"
                                           value="" placeholder="Mínimo">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="retencionIRPFMax" id="retencionIRPFMax"
                                           value="" placeholder="Máximo">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="id_country">País:</label>
                                <select class="form-control select2" multiple name="id_country[]" id="id_country">
                                    <?php foreach($empcountries as $country): ?>
                                    <option value="<?= $country['id'] ?>" <?= (isset($input['id_country']) && $country['id'] === $input['id_country']) ? 'selected' : '' ?>>
                                        <?= ucfirst($country['country_name']) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="/trabajadores-practice" class="btn btn-danger" value="">
                            Reiniciar filtros
                        </a>
                        <input type="submit" class="btn btn-primary ml-2" name="enviar" >
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Tabla trabajadores -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="col-6">
                    <h6 class="font-weight-bold text-primary mb-0">Trabajadores</h6>
                </div>
                <div class="col-6">
                    <a href="/trabajadores-practice/new/" class="btn btn-primary ml-1 float-right">
                        <i class="fas fa-plus-circle"></i> Nuevo Trabajador
                    </a>
                </div>
            </div>
            <!-- Table body -->
            <div class="card-body" id="card-table">
                <table class="table table-striped" id="tabladatos">
                    <tr>
                        <td>Nombre</td>
                        <td>Rol</td>
                        <td>Salario Bruto</td>
                        <td>Retención</td>
                        <td>País</td>
                        <td>Acciones</td>
                    </tr>
                    <tbody>
                        <?php foreach ($empleados as $empleado) : ?>
                        <tr class="<?= $empleado['activo'] ?  '' : 'table-danger'?>">
                            <td class="px-4 py-2">
                                <?= $empleado['username'] ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= $empleado['nombre_rol'] ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= $empleado['salarioBruto'] ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= $empleado['retencionIRPF'] ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= $empleado['country_name'] ?>
                            </td>
                            <td class="px-4 py-2">
                                <div class="d-flex align-items-center gap-3">
                                    <a href="/trabajadores/edit/" class="btn btn-success btn">
                                        <i class="fa-solid fas fa-edit"></i>
                                    </a>
                                    <a href="/trabajadores/delete/" class="btn btn-danger btn">
                                        <i class="fa-solid fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>