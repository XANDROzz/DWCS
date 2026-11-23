<?php

declare(strict_types=1);

?>

<div class="col-12">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Salario Bruto</th>
            <th>Retencion IRPF</th>
            <th>Activo</th>
            <th>Id rol</th>
            <th>Id country</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($trabajadores as $trabajador) : ?>
            <tr>
                <td>
                    <?= $trabajador['username']?>
                </td>
                <td>
                    <?= $trabajador['salarioBruto']?>
                </td>
                <td>
                    <?= $trabajador['retencionIRPF']?>
                </td>
                <td>
                    <?= $trabajador['activo']?>
                </td>
                <td>
                    <?= $trabajador['id_rol']?>
                </td>
                <td>
                    <?= $trabajador['id_country']?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


