<?php

declare(strict_types=1);

?>
<div class="row">
    <?php if (!empty($resultado)): ?>
        <?php
        // Recogemos los datos enviando valores por defecto si no existen
                $suspensosPorAlumno = $resultado['suspensosPorAlumno'] ?? [];
                $todosLosAlumnos = $resultado['todosLosAlumnos'] ?? [];

        // 1. Aprobados: alumnos que NO están en $suspensosPorAlumno (0 suspensos)
                $aprobados = array_filter($todosLosAlumnos, function($nombre) use ($suspensosPorAlumno) {
                    return !isset($suspensosPorAlumno[$nombre]);
                });

        // 2. Suspensos: alumnos con EXACTAMENTE 1 suspenso
                $suspensos = array_filter($todosLosAlumnos, function($nombre) use ($suspensosPorAlumno) {
                    return isset($suspensosPorAlumno[$nombre]) && $suspensosPorAlumno[$nombre] === 1;
                });

        // 3. Repetidores: alumnos con 2 O MÁS suspensos
                $repetidores = array_filter($todosLosAlumnos, function($nombre) use ($suspensosPorAlumno) {
                    return isset($suspensosPorAlumno[$nombre]) && $suspensosPorAlumno[$nombre] >= 2;
                });
        ?>
        <!-- Tarjetas de métricas globales -->
    <div class="col-12 mb-4">
        <div class="row">
            <!-- Tarjeta Aprobados -->
            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Alumnos Aprobados (<?php echo count($aprobados); ?>)
                        </div>
                        <div class="small font-weight-bold text-gray-800">
                            <?php echo !empty($aprobados) ? htmlspecialchars(implode(', ', $aprobados)) : '<i>Ninguno</i>'; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta Suspensos (1 asignatura) -->
            <div class="col-md-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Alumnos Suspensos (<?php echo count($suspensos); ?>)
                        </div>
                        <div class="small font-weight-bold text-gray-800">
                            <?php echo !empty($suspensos) ? htmlspecialchars(implode(', ', $suspensos)) : '<i>Ninguno</i>'; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta Repetidores (2+ asignaturas) -->
            <div class="col-md-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Repetidores (<?php echo count($repetidores); ?>)
                        </div>
                        <div class="small font-weight-bold text-gray-800">
                            <?php echo !empty($repetidores) ? htmlspecialchars(implode(', ', $repetidores)) : '<i>Ninguno</i>'; ?>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Tabla por Asignaturas -->
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Asignatura</th>
                    <th>Media</th>
                    <th>Suspensos</th>
                    <th>Aprobados</th>
                    <th>Nota max</th>
                    <th>Nota min</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($resultado as $nombreAsignatura => $datos): ?>
                    <?php if (is_array($datos) && array_key_exists('media', $datos)): ?>
                        <tr>
                            <?php if ($datos['media'] === null): ?>
                                <td><?php echo htmlspecialchars((string)$nombreAsignatura); ?></td>
                                <td colspan="5"><i>Sin alumnado</i></td>
                            <?php else: ?>
                                <td><?php echo htmlspecialchars((string)$nombreAsignatura); ?></td>
                                <td><?php echo number_format((float)$datos['media'], 2); ?></td>
                                <td><?php echo (int)$datos['suspensos']; ?></td>
                                <td><?php echo (int)$datos['aprobados']; ?></td>
                                <td><?php echo htmlspecialchars((string)$datos['max']['alumno']) . ": " . $datos['max']['nota']; ?></td>
                                <td><?php echo htmlspecialchars((string)$datos['min']['alumno']) . ": " . $datos['min']['nota']; ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <!-- Formulario de Entrada JSON -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cálculo de notas</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="json">JSON con los datos:</label>
                                <textarea class="form-control" rows="10" name="json"><?php echo $json ?? ''; ?></textarea>
                                <p class="text-danger small">
                                    <?php
                                    if (!empty($errores['json'])) {
                                        foreach ($errores['json'] as $error) {
                                            echo htmlspecialchars((string)$error) . '<br/>';
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Hacer cálculos" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>