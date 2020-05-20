<div class="modal fade bd-example-modal-lg" id="visuPedido" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg"     >
        <div class="modal-content" style="border-radius: calc(1rem - 1px) calc(1rem - 1px) calc(1rem - 1px) calc(1rem - 1px) !important;">
            <div class="modal-header">
                <h1 class="modal-title" >Visualização do Pedido </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo CONTROLLER . 'adm.php'; ?>" method="POST">
                <input type="hidden" name="arrDadosForm[id]" id="id_burgao-editar" value="">
                <input type="hidden" name="arrDadosForm[method]" value="editarBurgao">
                <input type="hidden" name="arrDadosForm[campo_where]" value="id_burgao">
                <input type="hidden" name="arrDadosForm[tabela]" value="burgoes">

                <div class="modal-body">

                    <div class="form-group" >
                        <span style="font-size:50px;" align="left">Pão: </span>
                        <span id="pao" style="font-size:30px;"></span>
                        <br/>
                        
                        <span style="font-size:50px;" align="left">Burgão: </span>
                        <span id="burgao" style="font-size:30px;"></span>
                        <br/>
                        <span style="font-size:50px;" align="left">Ponto: </span>
                        <span id="ponto" style="font-size:30px;"></span>
                        <br/>
                        <span style="font-size:50px;" align="left">Bebida: </span>
                        <span id="bebida" style="font-size:30px;"></span>
                        <br/>
                        <span style="font-size:50px;" align="left">Batata: </span>
                        <span id="batata" style="font-size:30px;"></span>
                        <br/>
                        <span style="font-size:50px;" align="left">Obs: </span>
                        <span id="obs" style="font-size:30px;"></span>
                    
                    </div>

                </div>

               
            </form>

        </div>
    </div>
</div>
<script>
$('.money').mask('000.000.000.000.000,00', {reverse: true});
</script>