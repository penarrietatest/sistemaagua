<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Main content -->
    <section class="content">
    
        <div class="container-fluid">
            <h3 class="text-center display-4">Lecturar medidor</h3>
            <div class="row mt-4">
            
                <div class="col-md-8 offset-md-2">
                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i><?php echo $this->session->flashdata("error"); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                    <form action="<?php echo base_url();?>readings/searchaffiliate" method="POST">
                        <div class="input-group">
                            <input type="search" name="appletree" class="form-control form-control-lg <?php echo !empty(form_error("appletree")) ? 'is-invalid' : '' ?>" placeholder="Manzano." value="<?php echo set_value("appletree"); ?>">
                            <?php echo form_error("appletree", '<div class="invalid-feedback">', '</div>'); ?>
                            <input type="search" name="lote" class="form-control form-control-lg <?php echo !empty(form_error("lote")) ? 'is-invalid' : '' ?>" placeholder="Lote" value="<?php echo set_value("lote"); ?>">
                            <?php echo form_error("lote", '<div class="invalid-feedback">', '</div>'); ?>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
            
            <?php if(!empty($meter)):?>
             <!-- /.card-header -->
             <div class="card-body mt-5">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Medidor</th>
                                    <th>Afiliado</th>
                                    <th>Direccion</th>
                                    <th>Manzano</th>
                                    <th>lote</th>
                                    <th>Lectura nueva</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($meter)) : ?>
                                    <?php foreach ($meter as $met) : ?>
                                        <tr>
                                            <td><?php echo $met->meter; ?></td>
                                            <td><?php echo $met->names; ?></td>
                                            <td><?php echo $met->address; ?></td>
                                            <td><?php echo $met->appletree; ?></td>
                                            <td><?php echo $met->lote; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>readings/reading/<?php echo $met->id; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Registrar lectura</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                <?php endif;?>
                <!--row -->

            

        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<!-- ======================================================================================================= -->


 <!-- Large modal -->
 <div class="modal fade bd-example-modal-lg" id="modal-default">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
        <div class="modal-body">
                                
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
