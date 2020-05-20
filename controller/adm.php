<?php
                @session_start();
                //Substituir require_once por _SESSION['PATH'];
                require_once $_SESSION['PATH'].'/model/MAdm.php';
                class Adm extends MAdm{
                    //CADASTRO
                        public function cadastrarBurgao(){ 
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->insert($arrDadosForm);
                            
                            if($result == true){
                                return $this->redirect('1','adm/cadastroBurgao');
                            }else{
                                return $this->redirect('2','adm/cadastroBurgao');
                            }
                        }

                        public function cadastrarProduto(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->insert($arrDadosForm);
                            
                            if($result == true){
                                return $this->redirect('1','adm/cadastroProduto');
                            }else{
                                return $this->redirect('2','adm/cadastroProduto');
                            }
                        }

                        public function cadastrarPromo(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->insert($arrDadosForm);
                            
                            if($result == true){
                                return $this->redirect('1','adm/cadastroPromocao');
                            }else{
                                return $this->redirect('2','adm/cadastroPromocao');
                            }
                        }
                    // EXCLUSAO
                        public function excluirBurgao(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->delete($arrDadosForm);

                            if($result == true){
                                return $this->redirect('1','adm/listaBurgoes');
                            }else{
                                return $this->redirect('2','adm/listaBurgoes');
                            }
                        }
                        public function excluirProduto(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->delete($arrDadosForm);

                            if($result == true){
                                return $this->redirect('1','adm/listarProdutos');
                            }else{
                                return $this->redirect('2','adm/listarProdutos');
                            }
                        }
                        public function excluirPromocao(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->delete($arrDadosForm);

                            if($result == true){
                                return $this->redirect('1','adm/listaPromocoes');
                            }else{
                                return $this->redirect('2','adm/listaPromocoes');
                            }
                        }
                    //EDIÇÃO
                        public function editarProduto(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->update($arrDadosForm);

                            if($result == true){
                                return $this->redirect('1','adm/listarProdutos');
                            }else{
                                return $this->redirect('2','adm/listarProdutos');
                            }
                        }
                        public function editarBurgao(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->update($arrDadosForm);

                            if($result == true){
                                return $this->redirect('1','adm/listaBurgoes');
                            }else{
                                return $this->redirect('2','adm/listaBurgoes');
                            }
                        }
                        public function editarPromo(){
                            $arrDadosForm = $_POST['arrDadosForm'];
                            $result = $this->update($arrDadosForm);

                            if($result == true){
                                return $this->redirect('1','adm/listarPromocoes');
                            }else{
                                return $this->redirect('2','adm/listarPromocoes');
                            }
                        }
                    //LISTAGEM
                        //Produtos
                        public function listaProdutosExcluir(){
                            $id = $_POST['id_produto'];
                            $busca = $this->listaDados("estoque",$id,'','id_produto');
                            $row = mysqli_Fetch_array($busca);

                            $arr = Array();
                            $arr['id_produto'] = $id;
                            $arr['str_nome'] = $row['str_nome'];
                            $arr['valor'] = $row['valor'];

                            echo json_encode($arr);
                        }
                        public function listaProdutosEditar(){
                            $id = $_POST['id_produto'];
                            $busca = $this->listaDados("estoque",$id,'','id_produto');
                            $row = mysqli_Fetch_array($busca);

                            $arr = Array();
                            $arr['id_produto'] = $id;
                            $arr['str_nome'] = $row['str_nome'];
                            $arr['valor'] = $row['valor'];

                            echo json_encode($arr);
                        }


                        //Burgões
                        public function listaBurgaoExcluir(){
                            $id = $_POST['id_burgao'];
                            $busca = $this->listaDados("burgoes",$id,'','id_burgao');
                            $row = mysqli_Fetch_array($busca);

                            $arr = Array();
                            $arr['id_burgao'] = $id;
                            $arr['str_nome'] = $row['str_nome'];
                            $arr['valor'] = $row['valor'];

                            echo json_encode($arr);
                        }
                        public function listaBurgaoEditar(){
                            $id = $_POST['id_burgao'];
                            $busca = $this->listaDados("burgoes",$id,'','id_burgao');
                            $row = mysqli_Fetch_array($busca);

                            $arr = Array();
                            $arr['id_burgao'] = $id;
                            $arr['str_nome'] = $row['str_nome'];
                            $arr['valor'] = $row['valor'];

                            echo json_encode($arr);
                        }
                        //Promoções
                        public function listaPromoExcluir(){
                            $id = $_POST['id_promocao'];
                            $busca = $this->listaDados("promocoes",$id,'','id_promocao');
                            $row = mysqli_Fetch_array($busca);

                            $arr = Array();
                            $arr['id_promocao'] = $id;
                            $arr['str_nome'] = $row['str_nome'];
                            $arr['valor'] = $row['valor'];
                            $arr['id_burgao'] = $row['id_burgao'];

                            echo json_encode($arr);
                        }
                        public function listaPromoEditar(){
                            $id = $_POST['id_promocao'];
                            $busca = $this->listaDados("promocoes",$id,'','id_promocao');
                            $row = mysqli_Fetch_array($busca);

                            $arr = Array();
                            $arr['id_promocao'] = $id;
                            $arr['str_nome'] = $row['str_nome'];
                            $arr['valor'] = $row['valor'];
                            $arr['id_burgao'] = $row['id_burgao'];

                            echo json_encode($arr);
                        }


                }
                $oAdm = new Adm();
                $classe = 'Adm';
                $oBjeto = $oAdm;
                @include_once '../application/request.php';

            ?>