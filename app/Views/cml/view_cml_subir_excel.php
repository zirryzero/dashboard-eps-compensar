<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5">Subir archivo Excel</h5>



            <form action="<?= base_url('saveExcel') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- Archivo -->
                <div class="mb-3">
                    <label for="file" class="form-label">Seleccionar archivo Excel:</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls" required>
                </div>
                <?php if ($message !== null) : ?>
                <div class="alert alert-success" role="alert"><?= $message ?></div>
                <?php endif ?>
                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block">Subir archivo</button>
                </div>

            </form>
        </div>
    </div>
</div>