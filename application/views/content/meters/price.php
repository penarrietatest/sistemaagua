<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-6">
            <h1>Precio agua</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Precio</a></li>
              <li class="breadcrumb-item active">Ver</li>
            </ol>
          </div> 
        </div>
        
      </div><!-- /.container-fluid -->
      
      
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if ($this->session->flashdata("success")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i><?php echo $this->session->flashdata("success") ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body py-5">
          <div class="row">
            <div class="col-12 col-sm-5 pr-5">                     
                <h5>Precio actual [m3]   
                    <span class="float-right"> 
                        <?php if(!empty($price)):?> 
                            <?php echo $price->price . ' Bs'?>
                        <?php endif;?> 
                    </span>
                </h5> 
                <hr>
            </div>

            <div class="col-12 col-sm-7">
                <form class="form-horizontal" action="<?php echo base_url();?>price/register" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nuevo precio [m3]: *</label>
                        <div class="col-sm-8">
                            <input type="decimal" name="price" class="form-control <?php echo !empty(form_error("price")) ? 'is-invalid' : '' ?>" placeholder="Ingrese nuevo precio" value="<?php echo set_value("price");?>">
                            <?php echo form_error("price", '<div class="invalid-feedback">', '</div>'); ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <button type="submit" class="btn btn-success float-right">Registrar</button>
                    <!-- /.card-footer -->
                </form> 
            </div>

          </div>
         
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

<!-- ======================================================================================================= -->