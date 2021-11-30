<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Medidores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Medidores</a></li>
                        <li class="breadcrumb-item active">Ver</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata("success")) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i><?php echo $this->session->flashdata("success") ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <!-- Button trigger modal -->
                            <a href="<?php echo base_url(); ?>meters/add" class="btn btn-outline-info btn-xs p-2 bd-highlight">
                                <i class="fas fa-user-plus"></i> Nuevo Medidor
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Medidor</th>
                                    <th>Afiliado</th>
                                    <th>Direccion</th>
                                    <th>Manzano</th>
                                    <th>lote</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($meters)) : ?>
                                    <?php foreach ($meters as $meter) : ?>
                                        <tr>
                                            <td><?php echo $meter->id; ?></td>
                                            <td><?php echo $meter->meter; ?></td>
                                            <td><?php echo $meter->names; ?></td>
                                            <td><?php echo $meter->address; ?></td>
                                            <td><?php echo $meter->appletree; ?></td>
                                            <td><?php echo $meter->lote; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>affiliates/edit/<?php echo $meter->id; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="<?php echo base_url(); ?>affiliates/delete/<?php echo $meter->id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ======================================================================================================= -->