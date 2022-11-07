<?= $this->extend('admin/template/admin_template'); ?>

<?= $this->section('content'); ?>

<div>
    <div class="card">
        <div class="card-header">
            <p class="card-title"><?= esc($title); ?></p>
            <a href="<?php echo base_url('userinfo/new'); ?>" class="btn btn-primary">Nuevo</a>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                </tr>
                </thead>

                <tbody>
                <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td>
                                <?= esc($usuario['id']); ?>
                            </td>

                            <td>
                                <?= esc($usuario['name']); ?>
                            </td>

                            <td>
                                <?= esc($usuario['email']) ?>
                            </td>

                            <td>
                                <?= esc($usuario['phone_no']) ?>
                            </td>

                            <td>
                                <?php
                                    if ($usuario['role'] == 'admin') {
                                        echo '<p class="badge bg-primary">Administrador</p>';
                                    } else {
                                        echo '<p class="badge bg-secondary">Usuario</p>';
                                    }
                                    ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>







