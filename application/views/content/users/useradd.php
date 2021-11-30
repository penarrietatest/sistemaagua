<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
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
                        <h3 class="card-title">Registrar nuevo usuario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo base_url(); ?>users/register" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombres *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("names")) ? 'is-invalid' : '' ?>" placeholder="Nombres" name="names" value="<?php echo set_value("names"); ?>">
                                    <?php echo form_error("names", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">1er apellido *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("firstname")) ? 'is-invalid' : '' ?>" placeholder="Primer apellido" name="firstname" value="<?php echo set_value("firstname"); ?>">
                                    <?php echo form_error("firstname", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">2do apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("lastname")) ? 'is-invalid' : '' ?>" placeholder="Segundo apellido" name="lastname" value="<?php echo set_value("lastname"); ?>">
                                    <?php echo form_error("lastname", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Usuario *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo !empty(form_error("username")) ? 'is-invalid' : '' ?>" placeholder="Usuario" name="username" value="<?php echo set_value("username"); ?>">
                                    <?php echo form_error("username", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Contraseña *</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?php echo !empty(form_error("password")) ? 'is-invalid' : '' ?>" placeholder="Contraseña" name="password" value="<?php echo set_value("password"); ?>">
                                    <?php echo form_error("password", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Repetir contraseña *</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?php echo !empty(form_error("rpassword")) ? 'is-invalid' : '' ?>" placeholder="Repetir contraseña" name="rpassword" value="<?php echo set_value("rpassword"); ?>">
                                    <?php echo form_error("rpassword", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rol *</label>
                                <div class="col-sm-10">
                                    <select class="custom-select <?php echo !empty(form_error("id_roles")) ? 'is-invalid' : '' ?>" name="id_roles">
                                        <option></option>
                                        <?php foreach ($roles as $rol) : ?>
                                            <option value="<?php echo $rol->id; ?>" <?php echo $rol->id == set_value("id_roles") ? "selected" : ""; ?>><?php echo $rol->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error("id_roles", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Imagen *</label>

                                <div class="custom-file col-sm-5 ml-2">
                                    <input type="file" class="custom-file-input form-control <?php echo !empty(form_error("image")) ? 'is-invalid' : '' ?>" id="customFile" name="image" value="<?php echo set_value("image"); ?>">
                                    <label class="custom-file-label" for="customFile"></label>
                                    <?php echo form_error("image", '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>users" class="btn btn-default">Cancelar</a>
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