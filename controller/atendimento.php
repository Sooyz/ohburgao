<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'model/MAtendimento.php';

class Atendimento extends MAtendimento {

    public function cadastrarPedido() {
        $arrDadosForm = $_POST['arrDadosForm'];

        if ($arrDadosForm['quantidade'] == 0 || $arrDadosForm['quantidade'] == '' || $arrDadosForm['quantidade'] == null) {
            $arrDadosForm['valor'] = $arrDadosForm['valor'];
            $arrDadosForm['quantidade'] = '1';
        } else {
            $arrDadosForm['valor'] = $arrDadosForm['valor'] * $arrDadosForm['quantidade'];
        }

        $arrDadosForm['status'] = 'A';

        $result = $this->insert($arrDadosForm);
        if ($result == true) {
            return $this->redirect('1', 'atendimento/cadastroPedido');
        } else {
            return $this->redirect('2', 'atendimento/cadastroPedido');
        }
    }

    public function listaPedido() {
        $id = $_POST['id_pedido'];
        $arr = Array();

        $buscaPedido = $this->listaDados('pedidos', $id, '', 'id_pedido');

        $listaPedido = mysqli_fetch_array($buscaPedido);

        $buscaBurgao = $this->listaDados('burgoes', $listaPedido['id_burgao'], '', 'id_burgao');
        $listaBurgao = mysqli_fetch_array($buscaBurgao);

        $buscaPao = $this->listaDados('paes', $listaPedido['id_pao'], '', 'id_pao');
        $listaPao = mysqli_fetch_array($buscaPao);

        $buscaBebida = $this->listaDados('estoque', $listaPedido['id_produto'], '', 'id_produto');
        $listaBebida = mysqli_fetch_array($buscaBebida);

        if ($listaPedido['batata'] == 'S') {
            $batata = 'Sim';
        } else {
            $batata = 'Não';
        }

        $arr['pao'] = $listaPao['str_nome'];
        $arr['burgao'] = $listaBurgao['str_nome'];
        $arr['ponto'] = $listaPedido['ponto'];
        $arr['bebida'] = $listaBebida['str_nome'];
        $arr['batata'] = $batata;
        $arr['obs'] = $listaPedido['obs'];

        echo json_encode($arr);
    }


    public function listaPedidosCozinha() {
       $result = $this->listaPedidosA();
       return $result;
    }

    public function precoPromo() {
        $id = $_POST['id_promocao'];

        $buscaPromo = $this->listaDados('promocoes', $id, '', 'id_promocao');

        $listPromo = mysqli_fetch_array($buscaPromo);


        $arr = Array();

        $arr['valor'] = $listPromo['valor'];

        echo json_encode($arr);
    }

    public function adcBurgao() {
        $id = $_POST['id'];

        $busca = $this->listaDados('burgoes', $id, '', 'id_burgao');
        $lista = mysqli_fetch_array($busca);

        $arr = Array();

        $arr['valor'] = $lista['valor'];

        echo json_encode($arr);
    }

    public function adcBebida() {
        $id = $_POST['id'];

        $buscaEstoque = $this->listaDados('estoque', $id, '', 'id_estoque');
        $listaEstoque = mysqli_fetch_array($buscaEstoque);

        $arr = Array();

        $arr['valor'] = $listaEstoque['valor'];

        echo json_encode($arr);
    }

    public function atualizaPedido() {
        $sqlPedidos = $this->listaDadosWhere('pedidos', 'A', null, 'status');
        $contPedidos = mysqli_num_rows($sqlPedidos);

        $arrReturn = Array();
        $arrReturn['contagem'] = $contPedidos;
        while ($dadoPedidos = mysqli_fetch_array($sqlPedidos)) {
            $arrReturn['id'][] = $dadoPedidos['id_pedido'];
            $id_pedido = $dadoPedidos['id_pedido'];
            $arrReturn['nome'][] = $dadoPedidos['str_nome'];
            $arrReturn['pedido'][] = "  <a class='nav-link btn-vermelho-01'  href='#' data-toggle='modal' data-doc='$id_pedido'  data-target='#visuPedido'>
                                <i class='fa fa-edit'></i> Visualizar Pedido
                            </a>";
            $arrReturn['valor'][] = "R$ " . $dadoPedidos['valor'];
            $arrReturn['local'][] = $dadoPedidos['local'];
            $arrReturn['funcoes'][] = "   <div class='btn-group pull-right'>
                                <button class='btn green btn-xs btn-outline dropdown-toggle' data-toggle='dropdown'>Opções
                                    <i class='fa fa-angle-down'></i>
                                </button>
                                <ul class='dropdown-menu pull-right'>
                                    <li>
                                        <a class='nav-link btn-vermelho-01'  href='#' data-toggle='modal' data-doc='$id_pedido'  data-target='#finalizarPedido'>
                                            <i class='fa fa-check'></i> Finalizar Pedido
                                        </a>
                                    </li>
                                    <li>
                                        <a class='nav-link btn-vermelho-01'  href='#' data-toggle='modal' data-doc='$id_pedido'  data-target='#editarPedido'>
                                            <i class='fa fa-edit'></i> Editar Pedido
                                        </a>
                                    </li>
                                    <li>
                                        <a class='nav-link btn-vermelho-01'  href='#' data-toggle='modal' data-doc='$id_pedido'  data-target='#excluirPedido'>
                                            <i class='fa fa-edit'></i> Excluir Pedido
                                        </a>
                                    </li>
                                </ul>
        </div>";
        }
        echo json_encode($arrReturn);
    }

}

$oAtendimento = new Atendimento();
$classe = 'Atendimento';
$oBjeto = $oAtendimento;
@include_once '../application/request.php';
?>