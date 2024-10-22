<head>
    <link rel="stylesheet" href="estilo.css">
</head>
<?php
    include "conexao.php";
    // 1º Passo - Comando SQL
    $sql = "SELECT * FROM tb_clientes";

    // 2º Passo - Preparar a conexão
    $consultar = $pdo->prepare($sql);

    // 3º Passo - Tentar executar e mostrar resultados
    try{
        $consultar->execute();
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $item){
            $codigo = $item['id_cliente'];
            $nome = $item['nome_cliente'];
            $telefone = $item['telefone_cliente'];
            $endereco = $item['endereco_cliente'];
            $email = $item['email'];
            echo "
                  <div class='cartoes'>
                        <h3>Nº <span class='cod_cliente'>$codigo</span></h3>
                        <p>Cliente: <span class='nome'>$nome</span></p>
                        <p>Contato: <span class='contato'>$telefone</span></p>
                        <p>Endereco: <span class='endereco'>$endereco</span></p>
                        <p>E-mail: <span class='email'>$email</span></p>
                  </div>                         
            ";
        }
    }catch(PDOException $erro){
        echo "Falha ao consultar resultados!".$erro->getMessage();
    }
?>