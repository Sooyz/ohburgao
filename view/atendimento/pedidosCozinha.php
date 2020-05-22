<style>
#sample_5 tr td {
    height: 300px;
}
</style>
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    
    <?php $bscVal = $oAtendimento->listaPedidosCozinha();
    $cont = 0;
    while ($row = mysqli_fetch_array($bscVal)) {
    ?>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="col-md-6 col-sm-12">
                <div class="portlet green-meadow box">
                    <div class="portlet-title">
                        <div class="caption">
                        <i class="fa fa-pencil"></i></i>Pedido: <?= $row['id_pedido'];?> </div>
                        
                    </div>
                   
                    <div class="portlet-body">
                   
                        <div class="row static-info">
                            <div class="col-md-5 name"> Pedido: </div>
                            <div class="col-md-7 value"><span class="label label-info label-sm"> <?= $row['nome_pao'];?> </span>
                             <?php if($row['nome_promo'] != ''){ echo $row['nome_promo'];?>
                            <?php }?>
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Ponto da Carne: </div>
                            <div class="col-md-7 value"> <?= $row['ponto'];?> </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Batata: </div>
                            <div class="col-md-7 value"> <?php if($row['batata'] == 'S'){
                                echo 'Sim';
                            }else{
                                echo 'Não';
                            }
                            ?>
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Bebida: </div>
                            <div class="col-md-7 value">
                                <span class="label label-success"> <?= $row['nome_produto'];?> </span>
                            </div>
                        </div>
                        
                        <div class="row static-info">
                            <div class="col-md-5 name"> Quantidade: </div>
                            <div class="col-md-7 value"> 
                                <?php if($row['quantidade'] == '0'){
                                        echo '1';
                                    }else{ 
                                        echo $row['quantidade'];
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
 
             
        <input type="hidden" id="contador" value="<?= $cont; ?>">

    <!-- END EXAMPLE TABLE PORTLET-->

<?php 
    include 'modal/visuPedido.php';
    include 'modal/finalizarPedido.php';
    include 'modal/editarPedido.php';
    include 'modal/excluirPedido.php';
?>

<script>

    $(document).ready(function () {
        //Assim que carregar a pagina a cada 1s é executado
        Temporizador(true);
    });

    function atualizacaoPedido() {
        var valAtual = $('#contador').val();
        $.ajax({
            type: 'POST',
            data: 'method=atualizaPedido',
            url: '<?php echo CONTROLLER; ?>atendimento.php',
            success: function (data) {
                var obj = $.parseJSON(data);
//Há novos pedidos e vamos popular a tabela
                if (valAtual != obj.contagem) {
                    var table = $('#sample_5').DataTable();
                    table.clear().draw();
                    var length = Object.keys(obj.id).length;
                    for (var i = 0; i < length; i++) {
                        table.row.add([
                            obj.id[i],
                            obj.nome[i],
                            obj.pedido[i],
                            obj.valor[i],
                            obj.local[i],
                            obj.funcoes[i]
                        ]).draw();
                        //Atualizando contador
                        $('#contador').val(obj.contagem);
                    }


                }
            }
        });
    }
    function Temporizador(initiate) {
        if (initiate !== true) {
            atualizacaoPedido();
        }
        setTimeout(Temporizador, 1000);
    }
</script>