<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Formulário <small>Subtitulo ou descrição</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo RAIZ . "inicio/inicio"; ?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Formulário</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Diretório de navegação</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <a onclick="window.history.go(-1)" class="btn btn-fit-height grey-salt dropdown-toggle"><i class="fa fa-reply"></i> Voltar </a>
        </div>
    </div>
</div>
<!-- FIM TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <!-- ALERTAS -->
        <?php require HELPER . "mensagem.php"; ?>
        <!-- FIM ALERTAS -->




        <div class="tab-pane" >
            <div class="portlet box blue-madison" style="border-radius: 4px;">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Cadastrar Pedido </div>

                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="<?= CONTROLLER . 'atendimento.php'; ?>" method="POST" class="horizontal-form">
                        <input type="hidden" name="arrDadosForm[tabela]" value="pedidos">
                        <input type="hidden" name="arrDadosForm[method]" value="cadastrarPedido">

                        <div class="form-body">
                            <h3 class="form-section">Informações do Lanche</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Burgão<span class="required" aria-required="true">*</span></label>
                                        <select class="bs-select form-control" name="arrDadosForm[id_burgao]" id="burgao">
                                            <?php echo $oController->comboListar('burgoes', 'id_burgao', 'str_nome') ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Batata?</label>
                                        <div class="radio-list" style="padding: 6px 18px;">
                                            <label class="radio-inline">
                                                <input type="radio" name="arrDadosForm[batata]" id="batataS" value="S" doc="3"> Sim
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="arrDadosForm[batata]" id="batataN" value="N" doc="0"> Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bebida</label>
                                        <select class="bs-select form-control" name="arrDadosForm[id_produto]" id="bebida">
                                            <?php echo $oController->comboListar('estoque', 'id_produto', 'str_nome') ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tipo de pão</label>
                                        <select class="bs-select form-control" name="arrDadosForm[id_pao]" >
                                            <?php echo $oController->comboListar('paes', 'id_pao', 'str_nome') ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ponto da Carne</label>
                                        <div class="radio-list" style="padding: 6px 18px;">
                                            <label class="radio-inline">
                                                <input type="radio" name="arrDadosForm[ponto]"  value="Mal Passado" checked> Mal Passado
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="arrDadosForm[ponto]"  value="Ao Ponto"> Ao Ponto
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="arrDadosForm[ponto]"  value="Bem Passado"> Bem Passado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quantidade</label>
                                        <input type="number" name="arrDadosForm[quantidade]" min='0' class="form-control" id="qtd">
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <h3 class="form-section">Informações do Cliente</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nome do(a) cliente<span class="required" aria-required="true">*</span></label>
                                            <input type="text" name="arrDadosForm[str_nome]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Local de entrega<span class="required" aria-required="true">*</span></label>
                                            <input type="text" name="arrDadosForm[local]" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Promoção?<span class="required" aria-required="true">*</span></label>
                                            <select class="bs-select form-control" name="arrDadosForm[id_promocao]" id="promocao">
                                                <?php echo $oController->comboListar('promocoes', 'id_promocao', 'str_nome') ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valor<span class="required" aria-required="true">*</span></label>
                                            <input type="text" name="arrDadosForm[valor]" class="form-control" id="valor">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Obs</label>
                                            <input type="text" name="arrDadosForm[obs]" class="form-control" id="obs">
                                        </div>
                                    </div>

                                </div>


  <!--  <input type='hidden' id="burgaoValue" value='0'>
    <input type='hidden' id="batataValue" value='0'>
    <input type='hidden' id="bebidaValue" value='0'>-->


                            </div>






                        </div>
                        <div class="form-actions right">
                            <button type="button" class="btn default btn-circle">Cancelar</button>
                            <button type="submit" class="btn blue-madison btn-circle">
                                <i class="fa fa-check"></i> Salvar</button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>




    </div>
</div>

<script>

    $("#promocao").change(function () {

        var promocao = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?php echo CONTROLLER; ?>atendimento.php',
            data: 'id_promocao=' + promocao + '&method=precoPromo',
            success: function (dados) {
                var response = $.parseJSON(dados);
                $('#valor').val(response.valor);
            }
        });

    });

    /*
     
     
     $("#bebida").change(function() {
     var bebida = $(this).val();
     $.ajax({
     type: 'POST',
     url: '<?php echo CONTROLLER; ?>atendimento.php',
     data: 'id =' + bebida + '&method=adcBebida',
     success: function(dados) {
     console.log(dados);
     var response = $.parseJSON(dados);
     $('#bebidaValue').val(response.valor); 
     function soma();
     }
     });
     
     }); 
     
     $("#burgao").change(function() {
     alert('oi');
     
     var burgao = $(this).val();
     
     $.ajax({
     type: 'POST',
     url: '<?php echo CONTROLLER; ?>atendimento.php',
     data: 'id =' + burgao + '&method=adcBurgao',
     success: function(dados) {
     var response = $.parseJSON(dados);
     $('#burgaoValue').val(response.valor);
     
     }
     });
     
     }); 
     
     $('#batataS, #batataN').change(function() {
     if ($('#batataS').is(':checked')) {
     $('#batataValue').val('3');
     
     } else {
     $('#batataValue').val('0');
     
     }
     });
     
     
     
     
     */

    $('#money').mask('000.000.000.000.000,00', {reverse: true});
</script>