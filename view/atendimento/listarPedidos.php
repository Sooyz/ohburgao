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
                            <th class="all">Pedido</th>
                            <th class="all">Valor</th>
                            <th class="none">Local</th>
                            <th class="all">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $dados = $oController->listaDados('pedidos');
                            while($row = mysqli_fetch_array($dados)){
                               $id_pedido = $row['id_pedido'];
                    ?>
                        <tr>
                            <td><?= $id_pedido;?></td>
                            <td><?= $row['str_nome'];?></td>
                            <td>
                            <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id_pedido; ?>"  data-target="#visuPedido">
                                <i class="fa fa-edit"></i> Visualizar Pedido
                            </a>
                            </td>
                            <td>R$ <?= $row['valor'];?></td>
                            <td><?= $row['local'];?></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opções
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id_pedido; ?>"  data-target="#finalizarPedido">
                                                <i class="fa fa-check"></i> Finalizar Pedido
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id_pedido; ?>"  data-target="#editarPedido">
                                                <i class="fa fa-edit"></i> Editar Pedido
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id_pedido; ?>"  data-target="#excluirPedido">
                                                <i class="fa fa-edit"></i> Excluir Pedido
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                            <?php } 
                            include 'modal/visuPedido.php';
                            include 'modal/finalizarPedido.php';
                            include 'modal/editarPedido.php';
                            include 'modal/excluirPedido.php';
                            ?>
                    </tbody>
                </table>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->



        </div>
<script>
        $('#visuPedido').on('show.bs.modal', function (e) {
            var id_pedido = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'id_pedido=' + id_pedido + '&method=listaPedido',
                url: '<?php echo CONTROLLER; ?>atendimento.php',
                success: function (data) {
                    var response = $.parseJSON(data);
                 
                $('#pao').html(response.pao);
                $('#burgao').html(response.burgao);
                $('#ponto').html(response.ponto);
                $('#bebida').html(response.bebida);
                $('#batata').html(response.batata);
                $('#obs').html(response.obs);

                }
            });
        });
</script>