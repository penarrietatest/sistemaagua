<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Afiliados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Afiliados</a></li>
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
                        <h3 class="card-title">Registrar nuevo afiliado</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo base_url(); ?>affiliates/register" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">C.I. *</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?php echo !empty(form_error("ci")) ? 'is-invalid' : '' ?>" placeholder="Numero de carnet" name="ci" value="<?php echo set_value("ci"); ?>">
                                    <?php echo form_error("ci", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombres *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("names")) ? 'is-invalid' : '' ?>" placeholder="Nombres" name="names" value="<?php echo set_value("names"); ?>">
                                    <?php echo form_error("names", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Primer apellido *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("firstname")) ? 'is-invalid' : '' ?>" placeholder="Primer apellido" name="firstname" value="<?php echo set_value("firstname"); ?>">
                                    <?php echo form_error("firstname", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Segundo apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("lastname")) ? 'is-invalid' : '' ?>" placeholder="Segundo apellido" name="lastname" value="<?php echo set_value("lastname"); ?>">
                                    <?php echo form_error("lastname", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Direccion *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("address")) ? 'is-invalid' : '' ?>" placeholder="Direccion" name="address" value="<?php echo set_value("address"); ?>">
                                    <?php echo form_error("address", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Manzano *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("appletree")) ? 'is-invalid' : '' ?>" placeholder="Nro de manzano" name="appletree" value="<?php echo set_value("appletree"); ?>">
                                    <?php echo form_error("appletree", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lote *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("lote")) ? 'is-invalid' : '' ?>" placeholder="Nro de lote" name="lote" value="<?php echo set_value("lote"); ?>">
                                    <?php echo form_error("lote", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?php echo !empty(form_error("phone")) ? 'is-invalid' : '' ?>" placeholder="Telefono" name="phone" value="<?php echo set_value("phone"); ?>">
                                    <?php echo form_error("phone", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>affiliates" class="btn btn-default">Cancelar</a>
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