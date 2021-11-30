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
                        <li class="breadcrumb-item active">Registrar</li>
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
                        <h3 class="card-title">Registrar nuevo medidor</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo base_url(); ?>meters/register" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nro Medidor *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("meter")) ? 'is-invalid' : '' ?>" placeholder="Nro Medidor" name="meter" value="<?php echo set_value("meter"); ?>">
                                    <?php echo form_error("meter", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Afiliado *</label>
                                <div class="col-sm-10">
                                    <select class="custom-select <?php echo !empty(form_error("id_affiliate")) ? 'is-invalid' : '' ?>" name="id_affiliate">
                                        <option></option>
                                        <?php foreach ($affiliates as $affiliate) : ?>
                                            <option value="<?php echo $affiliate->id; ?>" <?php echo $affiliate->id == set_value("id_affiliate") ? "selected" : ""; ?>><?php echo $affiliate->names .' '. $affiliate->firstname .' '. $affiliate->lastname; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error("id_affiliate", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lectura *</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?php echo !empty(form_error("p_reading")) ? 'is-invalid' : '' ?>" placeholder="Lectura del medidor" name="p_reading" value="<?php echo set_value("p_reading"); ?>">
                                    <?php echo form_error("p_reading", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <textarea name="state" class="form-control <?php echo !empty(form_error("state")) ? 'is-invalid' : '' ?>" placeholder="Estado del equipo" value="<?php echo set_value("state"); ?>"></textarea>
                                    <?php echo form_error("state", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>meters" class="btn btn-default">Cancelar</a>
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