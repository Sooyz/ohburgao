<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'controller/controller.php';

class MAtendimento extends controller {

    function listaPedidosA() {
        $this->sql = "SELECT id_pedido, b.str_nome as nome_burgao,batata, e.str_nome as nome_produto, pa.str_nome as nome_pao,ponto, p.str_nome as nome_cliente, pr.str_nome as nome_promo,p.valor as valor, quantidade,obs,status
                    FROM pedidos as p INNER JOIN burgoes as b on b.id_burgao = p.id_burgao
                    INNER JOIN estoque as e on e.id_produto = p.id_produto
                    INNER JOIN promocoes as pr on pr.id_promocao = p.id_promocao 
                    INNER JOIN paes as pa on pa.id_pao = p.id_pao
                    where status = 'A'";
        $result = $this->query();
        return $result;
    }

}

?>