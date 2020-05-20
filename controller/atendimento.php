<?php
                @session_start();
                //Substituir require_once por _SESSION['PATH'];
                require_once $_SESSION['PATH'].'model/MAtendimento.php';
                class Atendimento extends MAtendimento{





                    public function cadastrarPedido(){
                        $arrDadosForm = $_POST['arrDadosForm'];

                        if($arrDadosForm['quantidade'] == 0 || $arrDadosForm['quantidade'] == ''  || $arrDadosForm['quantidade'] == null){
                            $arrDadosForm['valor'] = $arrDadosForm['valor'];
                            $arrDadosForm['quantidade'] = '1';
                        }else{
                            $arrDadosForm['valor'] = $arrDadosForm['valor'] * $arrDadosForm['quantidade'];
                        }

                        $arrDadosForm['status'] = 'A';

                        $result = $this->insert($arrDadosForm);
                        if($result == true){
                            return $this->redirect('1','atendimento/cadastroPedido');
                        }else{
                            return $this->redirect('2','atendimento/cadastroPedido');
                        }
                    }

                    public function listaPedido(){
                        $id = $_POST['id_pedido'];
                        $arr = Array();

                        $buscaPedido = $this->listaDados('pedidos',$id,'','id_pedido');

                        $listaPedido = mysqli_fetch_array($buscaPedido);

                        $buscaBurgao = $this->listaDados('burgoes',$listaPedido['id_burgao'],'','id_burgao');
                        $listaBurgao = mysqli_fetch_array($buscaBurgao);

                        $buscaPao = $this->listaDados('paes',$listaPedido['id_pao'],'','id_pao');
                        $listaPao = mysqli_fetch_array($buscaPao);

                        $buscaBebida = $this->listaDados('estoque',$listaPedido['id_produto'],'','id_produto');
                        $listaBebida = mysqli_fetch_array($buscaBebida);

                        if($listaPedido['batata'] == 'S'){
                            $batata = 'Sim';
                        }else{
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























                    public function precoPromo(){
                        $id = $_POST['id_promocao'];
                       
                        $buscaPromo = $this->listaDados('promocoes',$id,'','id_promocao');
                        
                        $listPromo = mysqli_fetch_array($buscaPromo);


                        $arr = Array();

                        $arr['valor'] = $listPromo['valor'];
                        
                        echo json_encode($arr);

                     }

                    public function adcBurgao(){
                        $id = $_POST['id'];

                        $busca = $this->listaDados('burgoes',$id,'','id_burgao');
                        $lista = mysqli_fetch_array($busca);

                        $arr = Array();

                        $arr['valor'] = $lista['valor'];

                        echo json_encode($arr);
                    }

                    public function adcBebida(){
                        $id = $_POST['id'];

                        $buscaEstoque = $this->listaDados('estoque',$id,'','id_estoque');
                        $listaEstoque = mysqli_fetch_array($buscaEstoque);

                        $arr = Array();

                        $arr['valor'] = $listaEstoque['valor'];

                        echo json_encode($arr);
                    }

                 

                }
                $oAtendimento = new Atendimento();
                $classe = 'Atendimento';
                $oBjeto = $oAtendimento;
                @include_once '../application/request.php';

            ?>