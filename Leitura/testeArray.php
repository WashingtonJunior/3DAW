<?php
    $nomearq = "alunosImp.csv";
    $arquivo = fopen($nomearq, "r") or die("Não abriu o arquivo!");
    $linhas = array();
    $colunas = array();
    //$conteudo = fread($arquivo, filesize($nomearq));
    //echo $conteudo;

    while (!feof($arquivo))
    {
        $linhas[] = fgets($arquivo);
    }

    //$linhas[] = explode("\r", $conteudo);

    foreach ($linhas as $linha)
    {
        echo $linha;
        echo "<br>";

        $colunas = explode(";", $linha);

        foreach ($colunas as $coluna)
        {
            echo $coluna . " -> ";
        }
    }

    fclose($arquivo);
?>