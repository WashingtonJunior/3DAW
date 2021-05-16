<?php
    /*
    Importar usuarios a partir de um arquivo CSV.
    */

    include 'abrirConexao.php';

    $nomearq = $_FILES['inputArq']['tmp_name'];

    $arquivo = fopen($nomearq, "r") or die("Não abriu o arquivo!");
    $linhas = array();
    $colunas = array();
    $conteudo = fread($arquivo, filesize($nomearq));
    fclose($arquivo);
    
    $linhas = explode("\r", $conteudo);

    foreach ($linhas as $linha)
    {
        $colunas = explode(";", $linha);

        $vId = $colunas[0];
        $vNome = $colunas[1];
        $vEmail = $colunas[2];
        $vSenha = $colunas[3];
        $vTipo = $colunas[4];
        $vPerfil = $colunas[5];

        if ($vId!=0)
        {
            $sql = "UPDATE usuarios SET nome = '$vNome', email = '$vEmail', senha = '$vSenha', tipo = $vTipo, perfil = $vPerfil WHERE id = $vId;";
    
            $result = $conn->query($sql);

            if ($conn->affected_rows>0)
                echo $linha . " -> alteração efetuada! <br />";
            else
                echo $linha . " -> alteração não efetuada! <br />";
        }
        else
        {
            $sql = "INSERT INTO usuarios SET nome = '$vNome', email = '$vEmail', senha = '$vSenha', tipo = $vTipo, perfil = $vPerfil;";
    
            $result = $conn->query($sql);

            if ($conn->affected_rows>0)
                echo $linha . " -> inclusão efetuada! <br />";
            else
                echo $linha . " -> inclusão não efetuada! <br />";
        }
    }
?>