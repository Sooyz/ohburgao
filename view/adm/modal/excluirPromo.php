<div class="modal fade bd-example-modal-lg" id="excluirPromo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg"     >
        <div class="modal-content" style="border-radius: calc(1rem - 1px) calc(1rem - 1px) calc(1rem - 1px) calc(1rem - 1px) !important;">
            <div class="modal-header">
                <h5 class="modal-title" >Exclusão de Promoção </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo CONTROLLER . 'adm.php'; ?>" method="POST">
                <input type="hidden" name="arrDadosForm[id]" id="id_promocao-excluir" value="">
                <input type="hidden" name="arrDadosForm[method]" value="excluirPromocao">
                <input type="hidden" name="arrDadosForm[campo_where]" value="id_produto">
                <input type="hidden" name="arrDadosForm[tabela]" value="promocoes">

                <div class="modal-body">

                <div class="form-group" >
                        <label class="form-control-label text-uppercase" for="n_sei"><span style="color: red;">*</span>Nome do Produto</label>
                        <input class="form-control" type="text"  name="arrDadosForm[str_nome]" id="promo-nome-excluir" disabled>
                </div>
                <div class="form-group" >
                        <label class="form-control-label text-uppercase" for="n_sei"><span style="color: red;">*</span>Valor do Produto</label>
                        <input class="form-control" type="text"  name="arrDadosForm[valor]" id="promo-valor-excluir" disabled>
                </div>
                

                </div>

                <div class="modal-footer" style="border-radius: 0 0 calc(1rem - 1px) calc(1rem - 1px); background-color: #EBEBEB !important;">
                    <button class="btn btn-danger" type="submit">Excluir</button>
                </div>
            </form>

        </div>
    </div>
</div>
