<?= $this->extend('admin/template/admin_template'); ?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">


<?= $this->section('botones') ?>
<div class="has-text-left">
    <a href="/tickets/new" class="button is-outlined is-light has-text-center">
        <span class="mdi mdi-24px mdi-plus-circle-outline"></span>  Nuevo
    </a>

</div>

<?= $this->endSection() ?>



<?= $this->section('content'); ?>

<!--
<section class="is-justify-content-end">
    <div>
        <a href="tickets/pdf" class="button is-outlined is-light-has-text-center"><span></span>Generar PDF</a>

    <a href="/tickets/descargarpdf" class="button is-outlined is-light-has-text-center"><span></span>Descargar PDF</a>
    </div>
</section>
-->

<div class="card">
<div class="card-header">
<h3 class="card-title"></h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr class="">
                <th>ID</th>
                <th width="">Estado</th>
                <th width="">Asunto</th>
                <th width="">Descripción</th>
                <th width="">Acciones</th>
            </tr>
            </thead>

            <tbody>
            <?php if (!empty($tickets) && is_array($tickets)): ?>
                <?php foreach ($tickets as $ticket): ?>
                    <?php
                    if ($ticket['status'] == 's01') {
                        echo '<tr class="has-background-danger-light">';
                    } else if ($ticket['status'] == 's02') {
                        echo '<tr class="has-background-info-light">';
                    } else if ($ticket['status'] == 's03') {
                        echo '<tr class="has-background-danger-light">';
                    } else if ($ticket['status'] == 's04') {
                        echo '<tr class="has-background-success-light">';
                    } else if ($ticket['status'] == 's05') {
                        echo '<tr class="has-background-light">';
                    } else if ($ticket['status'] == 's06') {
                        echo '<tr class="has-background-success">';
                    } else if ($ticket['status'] == 's07') {
                        echo '<tr class="has-background-light">';
                    } else if ($ticket['status'] == 's08') {
                        echo '<tr class="has-background-grey-light">';
                    }
                    ?>

                    <td>
                        <?= esc($ticket['id']); ?>
                    </td>

                    <td width="">
                        <div class="">
                            <?php
                            if ($ticket['status'] == 's01') {
                                echo 'No iniciado';
                            } else if ($ticket['status'] == 's02') {
                                echo 'Iniciado';
                            } else if ($ticket['status'] == 's03') {
                                echo 'En revisión';
                            } else if ($ticket['status'] == 's04') {
                                echo 'En proceso';
                            } else if ($ticket['status'] == 's05') {
                                echo 'Finalizado';
                            } else if ($ticket['status'] == 's06') {
                                echo 'Abierto';
                            } else if ($ticket['status'] == 's07') {
                                echo 'Re-abierto';
                            } else if ($ticket['status'] == 's08') {
                                echo 'Cerrado';
                            }
                            ?>
                        </div>
                    </td>

                    <td class="">
                        <p class="is-uppercase has-text-weight-semibold"><?= esc($ticket['title']) ?></p>
                    </td>

                    <td class="">
                        <?= esc($ticket['description']) ?>
                    </td>

                    <td class="">


                        <div class="">
                            <a class="" href="<?= base_url('tickets/'.$ticket['id']); ?>">
                                <span class="mdi mdi-24px mdi-open-in-new"> Abrir</span>
                            </a>
                            <!--<a href="#" class="is-inverted is-black is-small"><span class="mdi mdi-24px mdi-file-document-edit"></span></a>


                            <form class="display-none volver" method="post" action="<?/*= base_url('tickets/'.$ticket['id'])*/?>" id="ticketDeleteForm<?/*=$ticket['id']*/?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <a  href="javascript:void(0)" onclick="deleteTicket('ticketDeleteForm<?/*=$ticket['id']*/?>')" class="is-inverted is-danger is-small" title="Eliminar">
                                    <span class="mdi mdi-24px mdi-delete-circle"></span>
                                </a>
                            </form>-->

                        </div>


                        <!-- <div class="buttons has-addons is-centered">
									<a class="button" href="<?= base_url('tickets/show/'.$ticket['id']); ?>">
										<span class="mdi mdi-24px mdi-eye"></span>
									</a>
									<a href="#" class="button"><span class="mdi mdi-24px mdi-file-document-edit"></span></a>
									<a href="#" class="button is-danger is-selected">
										<span class="mdi mdi-24px mdi-delete-circle"></span>
									</a>
								</div> -->
                    </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</div>









<!--
<script>
    $(document).ready( function () {
          $('#dtTickets').DataTable(
              {
                  "language": {
                      "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                  },
                  "scrollX": true,
                  "order": [[0, 'desc']],
                  "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
              }
          );
    });


    $(document).ready(function () {
        $(".volver").click(function (event) {
            window.history.back();
        })
    })

    function deleteTicket(formId) {
        var confirm = window.confirm('¿Está seguro de eliminar este registro?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>
-->


<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>

<?= $this->include('admin/template/js'); ?>