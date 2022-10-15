<?php
  include_once "acao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="estilo.css">
    <title>Agenda de Contatos</title>
    <script src="script.js"></script>
</head>
<body>
    <h1>Meus Contatos</h1>
    <nav> <!-- menu -->
        <ul class="menu">
            <li id="cadastrar" class="itemenu"><a href="contato.php">Cadastrar</a></li>
            <li><a href="extras/sobre.html">Sobre</a></li>
            <li>Favoritos</li>
        </ul>
    </nav>
    <section> <!-- tabela de contatos-->
        <table class="table lista-contatos">
            <thead>
                <tr>
                    <th>Id</th><th>Nome</th><th>Sobrenome</th><th>Telefone</th><th>Alterar</th><th>Excluir</th>
                </tr>
            </thead>
            <?php
            $dados = carregaDoArquivoParaVetor();
            foreach($dados as $contato){
                $alterar = "<a href='contato.php?acao=editar&id=".$contato['id']."'>Alt</a>";
                $excluir = "<a href='#' onclick=excluir('index.php?acao=excluir&id=".$contato['id']."')>Exc</a>";
                echo "<tr><td>".$contato['id']."</td><td>".$contato['nome']."</td><td>".$contato['sobrenome']."</td><td>".$contato['telefone']."</td><td>".$alterar."</td><td>".$excluir."</td></tr>";
            }
            ?>
        </table>
    </section>
</body>
</html>