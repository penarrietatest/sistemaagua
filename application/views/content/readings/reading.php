<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Medidor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Medidor</a></li>
                        <li class="breadcrumb-item active">Registrar Lectura</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i><?php echo $this->session->flashdata("error") ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Registrar nuevo lectura</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo base_url(); ?>readings/readingadd" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id_meter" class="form-control" value="<?php echo $meter->id;?>">
                            <input type="hidden" name="p_reading" value="<?php echo (!$reading) ? $meter->p_reading : $reading->currentreading; ?>">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nro Medidor</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="meter" value="<?php echo $meter->meter; ?>" disabled="disabled">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Afiliado</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="affiliate" value="<?php echo $meter->names; ?>" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lectura anterior</label>
                                <div class="col-sm-10" >
                                    <input type="number" class="form-control" name="preading" value="<?php echo (!$reading) ? $meter->p_reading : $reading->currentreading; ?>" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nueva lectura</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?php echo !empty(form_error("currentreading")) ? 'is-invalid' : '' ?>" placeholder="Lectura actual" name="currentreading" value="<?php echo set_value("currentreading"); ?>">
                                    <?php echo form_error("currentreading", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Observacion</label>
                                <div class="col-sm-10">
                                    <textarea name="observation" class="form-control <?php echo !empty(form_error("observation")) ? 'is-invalid' : '' ?>" placeholder="Obsevacion del medidor" value="<?php echo set_value("observation"); ?>"></textarea>
                                    <?php echo form_error("observation", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <input type="hidden" name="id_affiliate" value="<?php echo $meter->uid;?>">
                            <input type="hidden" name="previousdate" value="<?php echo (!$reading) ? $meter->currentdate : $reading->currentdate; ?>">

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>readings" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-info float-right">Registar</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ======================================================================================================= -->