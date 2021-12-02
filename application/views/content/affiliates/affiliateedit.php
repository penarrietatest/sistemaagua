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
                        <h3 class="card-title">Editar afiliado</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo base_url(); ?>affiliates/update" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                        <input type="hidden" name="affilateId" value=" <?php echo $affiliate->id ?> ">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label">C.I. *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("ci")) ? 'is-invalid' : '' ?>" name="ci" value="<?php echo !empty(form_error('ci')) ? set_value("ci") :  $affiliate->ci;?>">
                                    <?php echo form_error("ci", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombres *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("names")) ? 'is-invalid' : '' ?>" name="names" value="<?php echo !empty(form_error('names')) ? set_value("names") :  $affiliate->names;?>">
                                    <?php echo form_error("names", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">1er apellido *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("firstname")) ? 'is-invalid' : '' ?>" name="firstname" value="<?php echo !empty(form_error('firstname')) ? set_value("firstname") :  $affiliate->firstname;?>">
                                    <?php echo form_error("firstname", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">2do apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("lastname")) ? 'is-invalid' : '' ?>" name="lastname" value="<?php echo !empty(form_error('lastname')) ? set_value("lastname") :  $affiliate->lastname;?>">
                                    <?php echo form_error("lastname", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Direccion *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("address")) ? 'is-invalid' : '' ?>" name="address" value="<?php echo !empty(form_error('address')) ? set_value("address") : $affiliate->address;?>">
                                    <?php echo form_error("address", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Manzano *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("appletree")) ? 'is-invalid' : '' ?>" name="appletree" value="<?php echo !empty(form_error('appletree')) ? set_value("appletree") :  $affiliate->appletree;?>">
                                    <?php echo form_error("appletree", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lote *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("lote")) ? 'is-invalid' : '' ?>" name="lote" value="<?php echo !empty(form_error('lote')) ? set_value("lote") :  $affiliate->lote;?>">
                                    <?php echo form_error("lote", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("phone")) ? 'is-invalid' : '' ?>" name="phone" value="<?php echo !empty(form_error('phone')) ? set_value("phone") :  $affiliate->phone;?>">
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