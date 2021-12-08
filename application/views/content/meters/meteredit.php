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
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Editar medidor</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo base_url(); ?>meters/update" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                        <input type="hidden" name="meterId" value=" <?php echo $meter->id ?> ">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nro medidor *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("meter")) ? 'is-invalid' : '' ?>" name="meter" value="<?php echo !empty(form_error('meter')) ? set_value("meter") :  $meter->meter;?>" readonly>
                                    <?php echo form_error("meter", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Afiliado *</label>
                                <div class="col-sm-10">
                                    <select class="custom-select <?php echo !empty(form_error("id_affiliate")) ? 'is-invalid' : '' ?>" name="id_affiliate">
                                        <option></option>
                                        <?php foreach ($affiliates as $affiliate) : ?>
                                            <option value="<?php echo $affiliate->id; ?>" <?php echo $affiliate->id == $meter->id_affiliate ? "selected":""; ?>><?php echo $affiliate->names .' '. $affiliate->firstname .' '. $affiliate->lastname;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error("id_affiliate", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lectura *</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control <?php echo !empty(form_error("p_reading")) ? 'is-invalid' : '' ?>" name="p_reading" value="<?php echo (!$reading) ? $meter->p_reading : $reading->currentreading; ?>">
                                    <?php echo form_error("p_reading", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("state")) ? 'is-invalid' : '' ?>" name="state" value="<?php echo !empty(form_error('state')) ? set_value("state") :  $meter->state;?>">
                                    <?php echo form_error("state", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>meters" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-info float-right">Modificar</button>
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