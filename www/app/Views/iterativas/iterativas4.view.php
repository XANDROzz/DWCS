<?php
declare(strict_types=1);
?>
<div class="row">
    <div class="col-12">
        <?php if ($err): ?>
            <div class="alert alert-danger">
                No puedo analizar cadenas vacías o sin caracteres válidos.
            </div>
        <?php elseif (!empty($charArray)): ?>
            <div class="alert alert-success">
                <p class="mb-0">
                    <?php foreach ($charArray as $char => $cantidad): ?>
                        <strong><?= htmlspecialchars((string)$char) ?></strong> aparece <?= $cantidad ?> <?= ($cantidad === 1) ? 'vez.' : 'veces.' ?><br>
                    <?php endforeach; ?>
                </p>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="/iterativas4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Conteo de caracteres de mayor a menor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="string">Texto a analizar:</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        name="string"
                                        id="string"
                                        value="<?= htmlspecialchars($_POST['string'] ?? '') ?>"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Analizar texto" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>