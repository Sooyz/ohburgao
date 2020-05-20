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
                    <?php $busca = $oController->listaDados('promocoes');
                            while($row = mysqli_fetch_array($busca)){
                            $id = $row['id_promocao'];
                            
                    ?>
                        <tr>
                            <td><?= $id; ?></td>
                            <td><?= $row['str_nome'];?></td>
                            <td>R$ <?=$row['valor'];?></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Ferramentas
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">

                                    <li>
                                        <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id; ?>"  data-target="#editarPromo">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                    </li>

                                    <li>
                                        <a class="nav-link btn-vermelho-01"  href="#" data-toggle="modal" data-doc="<?= $id; ?>"  data-target="#excluirPromo">
                                            <i class="fa fa-edit"></i> Excluir
                                         </a>
                                    </li>
                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
                            <?php }
                            include 'modal/editarPromo.php';
                            include 'modal/excluirPromo.php';
                            ?>
                    </tbody>
                </table>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->



        </div>

<script>
    $(document).ready(function () {
        $('#excluirPromo').on('show.bs.modal', function (e) {
            var id_promocao = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'id_promocao=' + id_promocao + '&method=listaPromoExcluir',
                url: '<?php echo CONTROLLER; ?>adm.php',
                success: function (data) {
                    console.log(data);
                    var response = $.parseJSON(data);
                    $('#id_promocao-excluir').val(response.id_burgao);
                    $("#promo-nome-excluir").val(response.str_nome);
                    $("#promo-valor-excluir").val(response.valor);
                }
            });
        });
        $('#editarPromo').on('show.bs.modal', function (e) {
            var id_promocao = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'id_promocao=' + id_promocao + '&method=listaPromoEditar',
                url: '<?php echo CONTROLLER; ?>adm.php',
                success: function (data) {

                    var response = $.parseJSON(data);
                    $('#id_promocao-editar').val(response.id_promocao);
                    $("#promo-nome-editar").val(response.str_nome);
                    $("#promo-valor-editar").val(response.valor);
                    $("#id_burgao-promo").val(response.id_burgao);
                }
            });
        });
    });
</script>