<!-- ======================================================================================================= -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Main content -->
    <section class="content">
    
        <div class="container-fluid">
            <h3 class="text-center display-4">Pagar recibo</h3>
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
                    <form action="<?php echo base_url();?>details/searchdetail" method="POST">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Ingrese numero de carnet de identidad para buscar..." value="4301028">
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
            
            <div class="row mt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right"> CI: </b> <?php echo $meter->ci; ?></div>
                                        <h4>Afiliado: <?php echo $meter->names; ?></h4>
                                        <p class="mb-0">Nro medidor: </b> <?php echo $meter->meter; ?></p>
                                        <p class="mb-0">Direccion: </b> <?php echo $meter->address; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            
            <!-- /.card-header -->
            <div class="card-body">
                <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Periodo</th>
                            <th>Fecha emision</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($details)) : ?>
                            <?php foreach ($details as $detail) : ?>
                                <tr>
                                    <td><?php echo $detail->id; ?></td>
                                    <td><?php echo $detail->period; ?></td>
                                    <td><?php echo $detail->dateofissue; ?></td>
                                    <td><?php echo $detail->total .' Bs'; ?></td>
                                    <?php $datadetail = $detail->id."*".$detail->period."*".$detail->dateofissue."*".$detail->total."*".$detail->previousreading."*".$detail->currentreading."*".$detail->previousdate."*".$detail->currentdate."*".$meter->names."*".$meter->ci."*".$meter->address."*".$meter->meter ;?>
                              
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-info btn-view-factura" data-toggle="modal" data-target="#modal-default" value="<?php echo $datadetail ;?>"><i class="far fa-eye"></i> VER</button>
                                            
                                            <a  href="<?php echo base_url();?>details/generateinvoice/<?php echo $detail->id;?>/<?php echo $meter->ci;?>" target="_blank" class="btn btn-success"><i class="fas fa-cart-arrow-down"></i> PAGAR</a>
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
