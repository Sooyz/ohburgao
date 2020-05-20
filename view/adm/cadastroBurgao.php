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
                            <i class="fa fa-plus"></i> Cadastrar Burgões </div>
                        
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?= CONTROLLER.'adm.php';?>" method="POST" class="horizontal-form">
                        <input type="hidden" name="arrDadosForm[tabela]" value="burgoes">
                        <input type="hidden" name="arrDadosForm[method]" value="cadastrarBurgao">
                            <div class="form-body">
                                <h3 class="form-section">Novo Burgão!</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nome do Burgão<span class="required" aria-required="true">*</span></label>
                                            <input type="text" name="arrDadosForm[str_nome]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valor<span class="required" aria-required="true">*</span></label>
                                            <input type="text" id="money" name="arrDadosForm[valor]" class="form-control" value="">
                                        </div>
                                    </div>
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
    $(document).ready(function () {
        // Pulsante da Mensagem de Sucesso ou Erro
        UIGeneral.init();
    });
</script>
<script>
$('#money').mask('000.000.000.000.000,00', {reverse: true});
</script>