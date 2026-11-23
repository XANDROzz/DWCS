<!-- Inicio html -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="text-primary"> COOKIES</h6>
                </div>
                <!-- form body -->
                <div class="card-body ">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label for="tema">Tema</label>
                            <select class="form-control" name="tema" id="tema">
                                <option value="light" <?= empty($_COOKIE['dark_mode']) ? 'selected' : '' ?>>Claro</option>
                                <option value="dark" <?= !empty($_COOKIE['dark_mode']) ? 'selected' : '' ?>>Oscuro</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>