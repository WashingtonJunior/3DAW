<?php
    /*
    Importar disciplinas a partir de um arquivo CSV.
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
        $vPeriodo = $colunas[2];
        $vPreReq = $colunas[3];
        $vCreditos = $colunas[4];

        if ($vId!=0)
        {
            $sql = "UPDATE disciplinas SET nome = '$vNome', periodo = $vPeriodo, idPreRequisito = $vPreReq, creditos = $vCreditos WHERE id = $vId;";
    
            $result = $conn->query($sql);

            if ($conn->affected_rows>0)
                echo $linha . " -> alteração efetuada! <br />";
            else
                echo $linha . " -> alteração não efetuada! <br />";
        }
        else
        {
            $sql = "INSERT INTO disciplinas SET nome = '$vNome', periodo = $vPeriodo, idPreRequisito = $vPreReq, creditos = $vCreditos;";
    
            $result = $conn->query($sql);

            if ($conn->affected_rows>0)
                echo $linha . " -> inclusão efetuada! <br />";
            else
                echo $linha . " -> inclusão não efetuada! <br />";
        }
    }

    /*
    echo "<html><head><link rel='stylesheet' type='text/css' media='screen' href='css/estilo.css'>";
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'></head>";
    echo "<body><h2 style='color: red;'>É necessário preencher o nome da disciplina e o período!</h2></body></html>";
    header( "refresh:3; url=cadDisciplina.html" ); 
    */
?>