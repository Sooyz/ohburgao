<div class="portlet light ">



            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Basic</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_5">
                    <thead>
                        <tr>

                            <!-- class:[ all ]-> "Coluna visivél quando for TELEFONE e DESKTOP -->
                            <!-- class:[ min-phone-l ]-> "Coluna visivél quando for TELEFONE -->
                            <!-- class:[ min-tablet ]-> "Coluna visivél quando for TABLET -->
                            <!-- class:[ desktop ]-> "Coluna visivél quando for DESKTOP -->

                            <th class="all">ID</th>
                            <th class="all">Nome</th>
                            <th class="all">Valor</th>
                            <th class="all">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $busca = $oController->listaDados('estoque');
                            while($row = mysqli_fetch_array($busca)){
                            $id = $row['id_produto'];
                    ?>
                        <tr>
                            <td><?= $id; ?></td>
                            <td><?= $row['str_nome'];?></td>
                            <td>R$<?= $row['valor'];?></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Ferramentas
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                        
                                        <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id; ?>"  data-target="#editarProduto">
                                                <i class="fa fa-edit"></i> Editar </a>
                                        </li>
                                        <li>
                                        
                                        <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id; ?>"  data-target="#excluirProduto">
                                    
                                                <i class="fa fa-edit"></i> Excluir </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
                            <?php }
                            include 'modal/editarProduto.php';
                            include 'modal/excluirProduto.php';
                            ?>
                    </tbody>
                </table>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->



        </div>
<script>
    $(document).ready(function () {
        $('#excluirProduto').on('show.bs.modal', function (e) {
            var id_produto = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'id_produto=' + id_produto + '&method=listaProdutosExcluir',
                url: '<?php echo CONTROLLER; ?>adm.php',
                success: function (data) {
                    console.log(data);
                    var response = $.parseJSON(data);
                    $('#id_produto-excluir').val(response.id_produto);
                    $("#produto-nome-excluir").val(response.str_nome);
                    $("#produto-valor-excluir").val('R$ ' + response.valor);
                }
            });
        });
        $('#editarProduto').on('show.bs.modal', function (e) {
            var id_produto = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'id_produto=' + id_produto + '&method=listaProdutosEditar',
                url: '<?php echo CONTROLLER; ?>adm.php',
                success: function (data) {
                    var response = $.parseJSON(data);
                    $('#id_produto-editar').val(response.id_produto);
                    $("#produto-nome-editar").val(response.str_nome);
                    $("#produto-valor-editar").val(response.valor);
                }
            });
        });
    });
</script>