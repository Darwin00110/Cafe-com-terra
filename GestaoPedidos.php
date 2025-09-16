<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café com Terra - Gerenciamento de Pedidos</title>
    <link rel="icon" href="./Imagens/iconSite.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        
        body {
            background-color: #493628;
            color: white;
        }

        .texto {
            font-size: 2.5rem;
            font-weight: 500;
            grid-row: 2;
        }

        .main {
            display: grid;
            grid-template-rows: 11rem auto;
            background-color: #242424;
            color: white;
            font-weight: 700;
        }

        .styleElements {
            background-color: #343434;
            color: white;
        }

        .styleElements:focus {
            background-color: #343434;
            color: white;
        }

        .container {
            display: grid;
        }

        .imagem {
            margin: auto;
        }

        .styleContainer {
            margin-top: 1.2rem;
        }

        .stylePedidos {
            background-color: #242424;
            color: white;
            border-radius: 8px;
        }
        .stylePedidos2 {
            background-color: #343434;
            color: white;
            border-radius: 8px;
        }

        .styleBottom {
            width: 50mm;
        }

        .pedidos {
            display: grid;
            
        }

    </style>
</head>

<body>
    <div class="container py-2 styleContainer">
        
        <!-- Formulário para novo pedido -->
        <div class="card mb-4">
            <div class="card-body main">
                <img src="./Imagens/logoSite-removebg-preview.png" width="200" class="imagem">
                <h1 class="display-5 text-center texto">Café com Terra - Gerenciamento de Pedidos</h1>
                <h2 class="card-title h4 mb-3">Registrar Novo Pedido</h2>
                <form id="orderForm" method="POST">
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Nome do Cliente</label>
                        <input type="text" id="customerName" name="NomeCliente" class="form-control styleElements" required>
                    </div>
                    <div class="mb-3">
                        <label for="item" class="form-label">Item do Pedido</label>
                        <select type="text" id="item" class="form-control styleElements" name="ItemPedido" required>
                            <option value="café tradicional">café tradicional</option>
                            <option value="coxinha">coxinha</option>
                            <option value="café da fazenda">café da fazenda</option>
                            <option value="bolo de fubá da casa">bolo de fubá da casa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantidade</label>
                        <input type="number" id="quantity" class="form-control styleElements" name="Quantidade" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Detalhes do Pedido</label>
                        <textarea id="details" class="form-control styleElements" name="DetalhesPedido" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Método de Pagamento</label>
                        <select id="paymentMethod" class="form-select styleElements" name="FormaDePagamento" required>
                            <option value="" disabled selected>Selecione o método</option>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                            <option value="Pix">Pix</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" name="SalvarAlteracoes">Adicionar Pedido</button>
                </form>
            </div>
        </div>

        <!-- Lista de pedidos -->
        <div class="card">
            <div class="card-body stylePedidos" id="bodyPedidos">
                <h2 class="card-title h4 mb-3">Pedidos Registrados</h2>
                <ul id="orderList" class="list-group">
                    <?php
                        $servername = "localhost";
                        $username = "root";   // padrão do XAMPP
                        $password = "";       // vazio no XAMPP
                        $dbname = "cafécomterra";
                        $port = 3307;         // troque se usar outra porta
                        
                        $conn = new mysqli($servername, $username, $password, $dbname, $port);
                        
                        if ($conn->connect_error) {
                            die("Falha na conexão: " . $conn->connect_error);
                        }
                        $verificarPedidosBanco = $conn->prepare(
                            "SELECT * FROM pedidos LIMIT 10"
                        );
                        echo "<script> document.getElementById('conteudo').style.whiteSpace = 'pre-line'; </script>";
                        $verificarPedidosBanco->execute();
                        $result = $verificarPedidosBanco->get_result(); 
                        while($row = $result->fetch_assoc()){
                            $NomeCliente = $row['nomeCliente'];
                            $ItemPedido = $row['itemDoPedido'];
                            $Quantidade = $row['quantidade'];
                            $DetalhesPedido = $row['detalhesDoProduto'];
                            $FormaDePagamento = $row['metodoDePagamento'];
                            $preco = $row['preco'];
                            
                            echo "<li class='list-group-item stylePedidos2 pedidos' style='white-space: pre-line' id='conteudo'>";
                            echo "Nome: $NomeCliente\n";
                            echo "Item: $ItemPedido\n";
                            echo "Quantidade: $Quantidade\n";
                            echo "Detalhes: $DetalhesPedido\n";
                            echo "Pagamento: $FormaDePagamento\n";
                            echo "Preço: R$ $preco\n";
                            echo "<button class='btn btn-outline-warning styleBottom' data-bs-toggle='modal' data-bs-target='#editModal' onclick='configPedidos()'>Editar</button>";
                            echo "<form method='POST'>";
                            echo "<button type='submit' class='btn btn-outline-danger styleBottom' name='DeletarUsuario'>ExcluirPedido</button>";
                            echo "</form>";
                            echo "</li>";
                        }
                    
                    ?>
                </ul>
            </div>
        </div>

        <!-- Modal para edição de pedidos -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="model">
                    <div class="modal-header stylePedidos">
                        <h5 class="modal-title" id="editModalLabel">Editar Pedido</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body stylePedidos">
                        <form id="editForm" method="POST">
                            <input type="hidden" id="editOrderId">
                            <div class="mb-3">
                                <label for="editCustomerName" class="form-label">Nome do Cliente</label>
                                <input type="text" id="editCustomerName" class="form-control styleElements" required>
                            </div>
                            <div class="mb-3">
                                <label for="editItem" class="form-label">Item do Pedido</label>
                                <input type="text" id="editItem" class="form-control styleElements" required>
                            </div>
                            <div class="mb-3">
                                <label for="editQuantity" class="form-label">Quantidade</label>
                                <input type="number" id="editQuantity" class="form-control styleElements" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDetails" class="form-label">Detalhes do Pedido</label>
                                <textarea id="editDetails" class="form-control styleElements" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editPaymentMethod" class="form-label">Método de Pagamento</label>
                                <select id="editPaymentMethod" class="form-select styleElements" required>
                                    <option value="" disabled>Selecione o método</option>
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                                    <option value="Cartão de Débito">Cartão de Débito</option>
                                    <option value="Pix">Pix</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" id="cancelEdit" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success" name="SalvarModificacoes" id="btn">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $servername = "localhost";
            $username = "root";   // padrão do XAMPP
            $password = "";       // vazio no XAMPP
            $dbname = "cafécomterra";
            $port = 3307;         // troque se usar outra porta

            $conn = new mysqli($servername, $username, $password, $dbname, $port);
            
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

        if(isset($_POST['SalvarAlteracoes'])){
            $NomeCliente = $_POST['NomeCliente'] ?? null; 
            $ItemPedido = $_POST['ItemPedido'] ?? null;
            $Quantidade = $_POST['Quantidade'] ?? null;
            $DetalhesPedido = $_POST['DetalhesPedido'] ?? null;
            $FormaDePagamento = $_POST['FormaDePagamento'] ?? null;
                    
            $preco = null;
            switch ($ItemPedido) {
                case 'café tradicional': $preco = 4.50; break;
                case 'coxinha': $preco = 7.00; break;
                case 'café da fazenda': $preco = 9.00; break;
                case 'bolo de fubá da casa': $preco = 6.00; break;
            }
        
            $queryCadastroPedidos = $conn->prepare(
                "INSERT INTO pedidos(nomeCliente, itemDoPedido, quantidade, detalhesDoProduto, metodoDePagamento, preco) 
                 VALUES (?, ?, ?, ?, ?, ?)"
            );
            $queryCadastroPedidos->bind_param("ssissd", 
                $NomeCliente, $ItemPedido, $Quantidade, $DetalhesPedido, $FormaDePagamento, $preco
            );
        
            if($queryCadastroPedidos->execute()){
                echo "Pedido enviado com sucesso!";
            } else {
                echo "Erro ao enviar o pedido: " . $conn->error;
            }
        
            $queryCadastroPedidos->close();   
        }

        if(isset($_POST['DeletarUsuario'])){
            $deletarUsuarios = $conn->prepare(
                "DELETE FROM pedidos WHERE nomeCliente = ? AND itemDoPedido = ?"
            );
            $deletarUsuarios->bind_param("ss", $NomeCliente, $ItemPedido);

            if($deletarUsuarios ->execute()){
                echo "<script>location.reload()</script>";
            } else {
                echo "Erro ao finalisar o pedido ". $conn-> error;
            }

            $deletarUsuarios->close();
        }

        }
    ?>

    <script>
        function configPedidos(){
            const NomeCliente = "<?php echo $NomeCliente;?>";
            const ItemPedido = "<?php echo $ItemPedido;?>";
            const Quantidade = "<?php echo $Quantidade;?>";
            const DetalhesPedido = "<?php echo $DetalhesPedido;?>";
            const FormaDePagamento = "<?php echo $FormaDePagamento;?>";
            
            var inputNome = document.getElementById("editCustomerName")
            inputNome.value = NomeCliente
            
            var inputItemPedido = document.getElementById("editItem")
            inputItemPedido.value = ItemPedido
            
            var inputQuantidade = document.getElementById("editQuantity")
            inputQuantidade.value = Quantidade
            
            var inputDetalhesPedidos = document.getElementById("editDetails")
            inputDetalhesPedidos.value = DetalhesPedidos
            
            var inputFormaDePagamento = document.getElementById("editPaymentMethod")
            inputFormaDePagamento.value = FormaDePagamento
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
    </script>
</body>

</html>