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

            
            

            <?php if(!empty($details)):?>
            
            <div class="row mt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right"> CI: </b> <?php echo $meter->ci; ?></div>
                                        <h4>Afiliado: <?php echo $meter->names.' '.$meter->firstname.' '.$meter->lastname; ?></h4>
                                        <p class="mb-0">Direccion: </b> <?php echo $meter->address; ?></p>
                                        <p class="mb-0">Manzano: </b> <?php echo $meter->appletree; ?></p>
                                        <p class="mb-0">Lote: </b> <?php echo $meter->lote; ?></p>
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
                            <th>Falta reunion</th>
                            <th>Otros</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($details)) : ?>
                            <?php foreach ($details as $detail) : ?>
                                <tr>
                                    <td><?php echo $detail->meter; ?></td>
                                    <td><?php echo $detail->period; ?></td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" name="missingmeeting" value="1">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="other" min="0" value="0" onchange="getValueInput()" id="domTextElement">
                                    </td>
                                    <td><?php echo $detail->total .' Bs'; ?></td>
                                    <?php $datadetail = $detail->id."*".$detail->period."*".$detail->dateofissue."*".$detail->amount."*".$detail->total."*".$detail->previousreading."*".$detail->currentreading."*".$detail->previousdate."*".$detail->currentdate."*".$detail->names."*".$detail->notify."*".$detail->ci."*".$detail->address."*".$detail->meter."*".$detail->appletree."*".$detail->lote;?>
                            
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



            <script>
                var Var_JavaScript = 0;    // declaración de la variable 
                const getValueInput = () =>{
                    let inputValue = document.getElementById("domTextElement").value; 
                    Var_JavaScript = inputValue;
                }
            
                var Var_JavaScript;    // declaración de la variable 
            
            </script>  
            <?php
                $var_PHP = "<script> document.writeln(Var_JavaScript); </script>"; // igualar el valor de la variable JavaScript a PHP 
                echo $var_PHP   // muestra el resultado 
            ?>




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
