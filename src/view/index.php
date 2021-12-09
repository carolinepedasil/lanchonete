<?php
require "header.php";
include "modalCliente.php";
include "modalBebida.php";
include "modalLanche.php";
include "modalAdicional.php";
require "../controller/clienteController.php";
require "../controller/lancheController.php";
require "../controller/bebidaController.php";
require "../controller/adicionalController.php";
require "../controller/pedidoController.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<body>
    <div class="container-fluid">
        <form action="../controller/pedidoController.php" method="post">
            <div class="row">
                <!-- Aqui está o menu da página inicial -->
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <img src="../../assets/logo.png" alt="FateBurguers" width="100" height="100">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" type="submit" name="botaoNovo" value="botaoNovo">Novo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" type="submit" name="botaoFecharPedido" value="botaoFechar">Fechar Pedido</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" type="submit" name="botaoSalvar" value="botaoSalvar">Salvar</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Cadastros
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" id="modal-clientes" href="indexCliente.php" role="button" class="btn">Clientes</a>
                                        <a class="dropdown-item" id="modal-bebidas" href="indexBebida.php" role="button" class="btn">Bebidas</a>
                                        <a class="dropdown-item" id="modal-lanches" href="indexLanche.php" role="button" class="btn">Lanches</a>
                                        <a class="dropdown-item" id="modal-adicionais" href="indexAdicional.php" role="button" class="btn">Adicionais</a>
                                        <!-- <div class="dropdown-divider"></div> -->
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Relatórios
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" id="modal-pedidoatual" href="#modal-container-pedidoatual" role="button" class="btn" data-toggle="modal">Imprimir Pedido Atual</a>
                                        <a class="dropdown-item" id="modal-todospedidos" href="#modal-container-todospedidos" role="button" class="btn" data-toggle="modal">Imprimir Todos Pedidos</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Aqui estão armazenados todos os Modals da página incial -->
                <div class="modal fade" id="modal-container-pedidoatual" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Pedido Atual
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">
                                    Imprimir
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Fechar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-container-todospedidos" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Todos Pedidos
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <tbody>
                                        <?php
                                        while ($objPedido = $pedido->fetch_object()) {
                                        ?>
                                            <tr>
                                                <th scope="row">Nome: <?php echo $objPedido->nomePedido; ?>
                                                    <p>Pedido: <?php echo $objPedido->codigoPedido; ?></p>
                                                    <p>Lanche: <?php echo $objPedido->lanchePedido; ?></td>
                                                    <p> Adicionais: <?php if ($objPedido->adicionalPedido != 0) echo "Sim, $objPedido->adicionalListaPedido";
                                                                    else echo "Não"; ?></p>
                                                    <p> Bebida: <?php
                                                                if ($objPedido->bebidaPedido == 1) {
                                                                    echo "Sim, ";
                                                                    if ($objPedido->bebidaGeladaPedido == 1) echo " gelada: ";
                                                                    else echo "não gelada: ";

                                                                    echo $objPedido->bebidaTipoPedido;
                                                                } else {
                                                                    echo "Não";
                                                                }
                                                                ?></p>
                                                    <p>Data: <?php echo $objPedido->dataPedido ?></p>
                                                    <p>Total: <?php echo $objPedido->totalPedido ?></p>
                                                    <p>----------------------------------------------------------------</p>
                                                </th>
                                            </tr><?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">
                                    Imprimir
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Fechar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aqui começa os campos da página incial -->
            <div class="row">
                <!-- Parte "Dados": -->


                <div class="col-md-7">
                    <fieldset class="border p-2">
                        <legend class="scheduler-border w-auto">Dados</legend>

                        <div class="form-group">
                            <label for="codigoPedido">Código do Pedido</label>
                            <input type="text" class="form-control" id="codigoPedido" name="codigoPedido" value=<?php echo $codigoPedido ?>>
                        </div>
                        <div class="form-group ">
                            <label for="nome">Nome do Cliente</label>
                            <div class="grupoMesmaLinha">
                                <select class="form-control" class="form-control" id="nomePedido" name="nomePedido" placeholder="Nome do Cliente">

                                    <?php
                                    while ($objCliente = $cliente->fetch_object()) {
                                    ?>

                                        <option><?php echo $objCliente->nome; ?></option>

                                    <?php } ?>

                                </select>
                                <a id="modal-clientes" href="#" role="button" class="btn btn-outline-primary" name="addButton" data-toggle="modal" data-target="#cadCliente">+</a>
                            </div>
                        </div>

                    </fieldset>
                    <!-- Aqui estão posicionados "Tipos de Lanche" e primeira parte de "Adicionais" -->
                    <div class="row">
                        <!-- Tipos de Lanche:-->
                        <div class="col-md-8">
                            <fieldset class="border p-2">
                                <legend class="scheduler-border w-auto">Tipos de Lanche</legend>

                                <div class="form-group grupoMesmaLinha">
                                    <select class="form-control" class="form-control" id="lanchePedido" name="lanchePedido" placeholder="Lanche do Pedido">

                                        <?php
                                        while ($objLanche = $lanche->fetch_object()) {
                                        ?>

                                            <option value="<?php echo $objLanche->codigo; ?>"><?php echo $objLanche->descricao; ?></option>

                                        <?php } ?>

                                    </select>
                                    <a id="modal-lanches" href="#" role="button" class="btn btn-outline-primary" name="addButton" data-toggle="modal" data-target="#cadLanche">+</a>
                                </div>

                            </fieldset>
                        </div>
                        <!-- Adicionais: -->
                        <div class="col-md-4">
                            <fieldset class="border p-2">
                                <legend class="scheduler-border w-auto">Adicionais</legend>

                                <div class="form-group ">
                                    <input type="radio" id="adicionalPedido" name="adicionalPedido" value="true"> Sim
                                    <input type="radio" id="adicionalPedido" name="adicionalPedido" value="false"> Não
                                    <a id="modal-adicionais" href="#" role="button" class="btn btn-outline-primary" name="addButton" data-toggle="modal" data-target="#cadAdicional">+</a>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Bebidas: -->
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="border p-2">
                                        <legend class="scheduler-border w-auto">Bebidas</legend>

                                        <div class="form-group">
                                            <input type="radio" id="bebidaPedido" name="bebidaPedido" value="true"> Sim
                                            <input type="radio" id="bebidaPedido" name="bebidaPedido" value="false"> Não


                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="border p-2">
                                        <legend class="scheduler-border w-auto">Bebida Gelada?</legend>

                                        <div class="form-group">
                                            <input type="radio" id="bebidaGeladaPedido" name="bebidaGeladaPedido" value="true"> Sim
                                            <input type="radio" id="bebidaGeladaPedido" name="bebidaGeladaPedido" value="false"> Não


                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset class="border p-2">
                                        <legend class="scheduler-border w-auto">Tipos de Bebidas</legend>

                                        <div class="form-group grupoMesmaLinha">
                                            <select class="form-control tipoSelects" id="bebidaTipoPedido" name="bebidaTipoPedido" placeholder="Bebida do Pedido">

                                                <?php
                                                while ($objBebida = $bebida->fetch_object()) {
                                                ?>

                                                    <option value="<?php echo $objBebida->codigo; ?>"><?php echo $objBebida->descricao; ?></option>

                                                <?php } ?>


                                            </select>
                                            <a id="modal-bebidas" href="#" role="button" class="btn btn-outline-primary" name="addButton" data-toggle="modal" data-target="#cadBebida">+</a>
                                        </div>

                                    </fieldset>
                                    <!-- Data do Pedido -->
                                    <fieldset class="border p-2">
                                        <legend class="scheduler-border w-auto">Data do Pedido</legend>

                                        <div class="form-group">
                                            <input type="date" class="form-control" id="dataPedido" name="dataPedido" placeholder="Data do Pedido">
                                        </div>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <!-- Parte 2 de Adicionais: -->
                        <div class="col-sm-4">
                            <fieldset class="border p-2">
                                <legend class="scheduler-border w-auto">Adicionais</legend>


                                <?php
                                while ($objAdicional = $adicional->fetch_object()) {
                                ?>

                                    <input type="checkbox" id="adicionalListaPedido" name="adicionalListaPedido" value="<?php echo $objAdicional->codigo; ?>" id="<?php echo $objAdicional->descricao; ?>">
                                    <label><?php echo $objAdicional->descricao; ?></label><br>


                                <?php } ?>


                            </fieldset>
                        </div>
                        <!-- Observações -->
                        <div class="col-md-12">
                            <fieldset class="border p-2">
                                <legend class="scheduler-border w-auto">Observações</legend>

                                <div class="form-group">
                                    <textarea class="form-control" id="observacoesPedido" name="observacoesPedido" rows="3" placeholder="Observações"></textarea>
                                </div>

                            </fieldset>
                        </div>

                    </div>
                </div>

                <!-- Coluna 2, com o Textarea -->
                <div class="col-md-5">
                    <fieldset class="border p-2">
                        <legend class="scheduler-border w-auto">Pedido</legend>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="exampleTextarea" rows="25" placeholder="Os dados do pedido aparecerão aqui.">

                                
                               
                            </textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>

            </div>
        </form>
    </div>
</body>

</html>