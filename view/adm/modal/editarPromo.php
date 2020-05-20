
<div class="modal fade bd-example-modal-lg" id="editarPromo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg"     >
        <div class="modal-content" style="border-radius: calc(1rem - 1px) calc(1rem - 1px) calc(1rem - 1px) calc(1rem - 1px) !important;">
            <div class="modal-header">
                <h5 class="modal-title" >Editar Produto </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo CONTROLLER . 'adm.php'; ?>" method="POST">
                <input type="hidden" name="arrDadosForm[id]" id="id_promocao-editar" >
                <input type="hidden" name="arrDadosForm[method]" value="editarPromo">
                <input type="hidden" name="arrDadosForm[campo_where]" value="id_promocao">
                <input type="hidden" name="arrDadosForm[tabela]" value="promocoes">

                <div class="modal-body">

                <div class="form-group" >
                        <label class="form-control-label text-uppercase" for="n_sei">Nome da Promoção</label>
                        <input class="form-control" type="text"  name="arrDadosForm[str_nome]" id="promo-nome-editar" >
                </div>
                <div class="form-group" >
                        <label class="form-control-label text-uppercase" for="n_sei">Valor da Promoção</label>
                        <input class="form-control money" type="text"  name="arrDadosForm[valor]" id="promo-valor-editar" >
                </div>
                <div class="form-group" >
                        <label class="form-control-label text-uppercase" for="n_sei">Burgão da Promoção</label>
                        <select class="bs-select form-control" name="arrDadosForm[id_burgao]" id="id_burgao-promo">
                            <?php echo $oController->comboListar('burgoes', 'id_burgao', 'str_nome') ?>
                        </select>
                </div>
                

                </div>

                <div class="modal-footer" style="border-radius: 0 0 calc(1rem - 1px) calc(1rem - 1px); background-color: #EBEBEB !important;">
                    <button class="btn btn-danger" type="submit">Editar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>

$('.money').mask('000.000.000.000.000,00', {reverse: true});
</script>