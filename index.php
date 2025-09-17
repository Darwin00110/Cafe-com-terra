<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Imagens/iconSite.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #493628;
        }

        /* --- CONTAINER PRINCIPAL --- */
        .main {
            position: relative;
            margin-top: 2rem;
            margin-bottom: 3rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 90vw;
            height: auto;
            border-radius: 8px;
            background-color: #AB886D;
            border: none;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: transform 1.5s ease;
            overflow: hidden;
        }

        /* --- LOGIN E CADASTRO --- */
        .login,
        .cadastro {
            display: grid;
            grid-template-rows: auto auto auto auto auto;
            margin-left: 1rem;
            gap: 1rem;
            padding: 2rem;
            background-color: #242424;
            border-radius: 8px;
            width: 100%;
            height: 100%;
            grid-column: 2;
        }

        .cadastro {
            display: none;
        }

        /* --- INPUTS --- */
        .Email,
        .Senha,
        .Nome,
        .ConfirmarSenha {
            background-color: #343434;
            border-radius: 0px;
            color: white;
            padding-left: 1rem;
        }

        .Email:focus,
        .Senha:focus,
        .Nome:focus,
        .ConfirmarSenha:focus {
            background-color: #343434;
            color: white;
            outline: none;
        }

        .Email::placeholder,
        .Senha::placeholder,
        .Nome::placeholder,
        .ConfirmarSenha::placeholder {
            color: white;
        }

        /* --- BOTÕES --- */
        .botao {
            position: relative;
            width: 50%;
            max-width: 200px;
            left: 50%;
            transform: translate(-50%);
        }

        /* --- IMAGEM --- */
        .imagem {
            justify-self: center;
            align-self: center;
            padding-top: 1rem;
            padding-bottom: 1rem;
            grid-column: 1;
            border-radius: 30px;
            max-width: 100%;
            height: auto;
        }

        .funcao {
            position: relative;
            right: 13%;
            justify-self: end;
            background-color: #343434;
            color: white;
            border-radius: 3px;
        }

        .carregamento {
            justify-self: center;
        }
        
        

        /* --- RESPONSIVIDADE --- */
        @media (max-width: 992px) {
            .main {
                grid-template-columns: 1fr;
                /* só uma coluna */
                width: 95vw;
            }

            .login,
            .cadastro {
                grid-column: 1;
                padding: 1.5rem;
            }

            .botao {
                width: 80%;
            }

            .imagem {
                width: 60%;
                margin: 1rem auto;
            }
        }

        @media (max-width: 576px) {
            .main {
                margin-top: 1rem;
                width: 100%;
            }

            .login,
            .cadastro {
                padding: 1rem;
            }

            .imagem {
                width: 80%;
            }

            .botao {
                width: 100%;
            }
        }
    </style>
    <title>Café com Terra</title>
</head>

<body>
    <div class="container main" id="main">
        <img src="./Imagens/imagem02.png" alt="Xicara de Café" width="620" height="620" class="imagem">
        <form method="POST" class="formLogin">
            <div class="container-fluid login" id="login">

                <img src="./Imagens/logoSite-removebg-preview.png" alt="" width="200" height="200" class="logoSite">
                <h1 class="Titulo">Café com Terra</h1>

                <div class="input-group mb-3 containerNome">
                    <input type="text" class="form-control Nome" placeholder="Nome de usuario"
                        aria-label="Nome de usuario" aria-describedby="basic-addon1" id="NomeDeUsuario"
                        name="inputNome">
                </div>

                <div class="input-group mb-3 containerEmail">
                    <span class="input-group-text iconEmail" id="basic-addon1">@</span>
                    <input type="text" class="form-control Email" placeholder="Endereço de email"
                        aria-label="Endereço de Email" aria-describedby="basic-addon1" id="EnderecoEmail"
                        name="inputEmail">
                </div>

                <div class="input-group mb-3 containerSenha">
                    <span class="input-group-text iconSenha" id="configSenha"><span class="iconamoon--eye"
                            id="configIcon"></span></span>
                    <input type="text" class="form-control Senha" placeholder="Senha" aria-label="Senha"
                        aria-describedby="basic-addon1" name="inputSenha" id="inputSenha">
                </div>
                <select name="funcao" class="funcao">
                    <option value="Usuario">Cliente</option>
                    <option value="Atendente">Atendente</option>
                    <option value="Cozinheiro">Cozinheiro</option>
                    <option value="Gerente">Gerente</option>
                </select>

                <button type="submit" class="btn btn-success botao" name="bottaoLogin">Enviar</button>
                <hr style="color: white; width: 100%;">
                <a class="link-cadastro" id="link-cadastro">Não tem uma conta? Cadastre-se</a>
            </div>
        </form>
        <form method="POST" id="formCadastro">
            <div class="container cadastro">
                <img src="./Imagens/logoSite-removebg-preview.png" alt="" width="200" height="200" class="logoSite">
                <h1 class="Titulo">Café com Terra</h1>

                <div class="input-group mb-3 containerNome">
                    <input type="text" class="form-control Nome" placeholder="Nome de usuario"
                        aria-label="Nome de usuario" aria-describedby="basic-addon1" name="InputNomeCadastro">
                </div>

                <div class="input-group mb-3 containerEmail">
                    <span class="input-group-text iconEmail" id="basic-addon1">@</span>
                    <input type="text" class="form-control Email" placeholder="Endereço de email"
                        aria-label="Endereço de Email" aria-describedby="basic-addon1" name="InputEmailCadastro">
                </div>

                <div class="input-group mb-3 containerSenha">
                    <span class="input-group-text iconSenha" id="configSenha"><span class="iconamoon--eye"
                            id="configIcon"></span></span>
                    <input type="text" class="form-control Senha" placeholder="Senha" aria-label="Senha"
                        aria-describedby="basic-addon1" id="inputSenha" name="InputSenhaCadastro">
                </div>

                <div class="input-group mb-3 containerConfirmarSenha">
                    <span class="input-group-text iconSenha" id="configSenha"><span class="iconamoon--eye"
                            id="configIcon"></span></span>
                    <input type="text" class="form-control ConfirmarSenha" placeholder="ConfirmarSenha"
                        aria-label="ConfirmarSenha" aria-describedby="basic-addon1" id="inputConfirmarSenha" name="InputSenhaCadastro2">
                </div>

                <select name="funcaoCadastro" class="funcao">
                    <option value="Usuario">Cliente</option>
                    <option value="Atendente">Atendente</option>
                    <option value="Cozinheiro">Cozinheiro</option>
                    <option value="Gerente">Gerente</option>
                </select>

                <button type="submit" class="btn btn-success botao" name="bottaoCadastro">Enviar</button>
                <hr style="color: white; width: 100%;">
                <a class="link-cadastro" id="link-login">Ja tem uma conta? Faça login</a>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $servername = "crossover.proxy.rlwy.net";
        $username = "root";   // padrão do XAMPP
        $password = "YKVjAfrxTmdYHzWQZEsaTOEFLIAiPiWJ";
        $dbname = "cafécomterra";
        $port = 44848;         // troque se usar outra porta
        
        $conn = new mysqli($servername, $username, $password, $dbname, $port);
        
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
        
        if(isset($_POST['bottaoLogin'])){
            $inputSenha = $_POST['inputSenha'];
            $inputEmail = $_POST['inputEmail'];
            $inputNome = $_POST['inputNome'];
            $funcao = $_POST['funcao'];
            
            $queryLogin = $conn->prepare("SELECT id FROM usuarios WHERE nome = ? AND email = ? AND senha = ? AND funcao = ?");
            $queryLogin->bind_param("ssss", $inputNome, $inputEmail, $inputSenha, $funcao);
            $queryLogin->execute();
            $queryLogin->store_result();
            if($queryLogin->num_rows > 0){
                echo "cliente logado com sucesso<br> <script>window.location.href='/GestaoPedidos.php'</script>";
                
            } else {
                echo "cliente não existe, tente novamente"; 
            }
        }
        
        else if(isset($_POST['bottaoCadastro'])){
            $inputSenha = $_POST['InputSenhaCadastro'] ?? null;
            $inputEmail = $_POST['InputEmailCadastro']  ?? null;
            $inputNome = $_POST['InputNomeCadastro']  ?? null;
            $funcao = $_POST['funcaoCadastro']  ?? null;
            $inputSenha02 = $_POST['InputSenhaCadastro2']  ?? null;
            
            if ($inputEmail == null || $inputNome == null || $inputSenha == null || $inputSenha02 == null){
                ECHO "É pra inserir os dados animal(produção)";
            }

            if($inputSenha != $inputSenha02){
                ECHO "<br>A senha de preferencia é pra ser igual tambem";
            }
            else{
                $queryCadastro = $conn->prepare("INSERT INTO usuarios(nome, email, senha, funcao) VALUES (?, ?, ?, ?)");
                $queryCadastro->bind_param("ssss", $inputNome, $inputEmail, $inputSenha, $funcao);
                if($queryCadastro -> execute()){
                    echo "Usuario cadastrado com sucesso";
                } else {
                    echo "Erro ao cadastrar ". $conn -> error;
                }
                $queryCadastro->close();   
            } 
                

        }

        $conn->close();
    }

    

?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var EnderecoEmail = document.getElementById("EnderecoEmail")
    var inputSenha = document.getElementById("inputSenha")
    var NomeDeUsuario = document.getElementById("NomeDeUsuario")

    var cadastro = document.querySelector(".cadastro")
    var formCadastro = document.getElementById("formCadastro")
    var formLogin = document.querySelector(".formLogin")

    var login = document.querySelector(".login")

    var valueEmail = EnderecoEmail.value
    var valueSenha = inputSenha.value
    var valueNomeUsuario = NomeDeUsuario.value

    function moverLogin() {
        let main = document.getElementById("main")
        main.style.transform = "translateX(-400mm)"
        setTimeout(() => {
            main.style.transform = "translateX(0mm)"
            login.style.display = "grid"
            formLogin.style.display = "grid"
            formCadastro.style.display = "none"
            cadastro.style.display = "none"
        }, 1500);
    }

    function moverCadastro(teste) {
        if (teste) {
            login.style.display = "none"
            cadastro.style.display = "grid"
        } else {
            let main = document.getElementById("main")
            let login = document.querySelector(".login")
            main.style.transform = "translateX(-400mm)"
            setTimeout(() => {
                main.style.transform = "translateX(0mm)"
                login.style.display = "none"
                
                cadastro.style.display = "grid"
            }, 2000);
        }
    }

    document.getElementById("configSenha").addEventListener("click", () => {
        if (document.getElementById("inputSenha").type === "text") {
            document.getElementById("inputSenha").type = "password"
            document.getElementById("configIcon").className = "iconamoon--eye-off"
        } else {
            document.getElementById("inputSenha").type = "text"
            document.getElementById("configIcon").className = "iconamoon--eye"
        }
    })

    document.getElementById("link-cadastro").addEventListener("click", () => {
        let main = document.getElementById("main")
        let login = document.querySelector(".login")
        main.style.transform = "translateX(-400mm)"
        setTimeout(() => {
            main.style.transform = "translateX(0mm)"
            login.style.display = "none"
            formLogin.style.display = "none"
            cadastro.style.display = "grid"
        }, 2000);
    })

    document.getElementById("link-login").addEventListener("click", () => {
        let main = document.getElementById("main")
        main.style.transform = "translateX(-400mm)"
        setTimeout(() => {
            main.style.transform = "translateX(0mm)"
            cadastro.style.display = "none"
            formLogin.style.display = "flex"
            login.style.display = "grid"
        }, 1500);
    })


</script>

</html>