<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Recibos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Recibos</a></li>
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
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Medidor</th>
                                    <th>Afiliado</th>
                                    <th>Lectura anterior</th>
                                    <th>Lectura actual</th>
                                    <th>Periodo</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($details)) : ?>
                                    <?php foreach ($details as $detail) : ?>
                                        <tr>
                                            <td><?php echo $detail->id; ?></td>
                                            <td><?php echo $detail->meter; ?></td>
                                            <td><?php echo $detail->names; ?></td>
                                            <td><?php echo $detail->previousreading; ?></td>
                                            <td><?php echo $detail->currentreading; ?></td>
                                            <td><?php echo $detail->period; ?></td>
                                            <td><?php echo $detail->total .' Bs'; ?></td>
                                            <td>
                                                <?php if ($detail->status == 1) { ?>
                                                    <div class="btn-group">
                                                        <a class="btn btn-success btn-sm">Pagado</a>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="btn-group">
                                                        <a class="btn btn-warning btn-sm">Adeudado</a>
                                                    </div>
                                                <?php  } ?>
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