<?php
    echo "Leitura de Arquivos";
    echo "<br><br>";
    //echo readfile("alunosImp.csv");

    $arquivo = fopen("alunosImp.csv", "r") or die("Não consegui abrir o arquivo, deu erro");
    //echo fread($arquivo, filesize("alunosImp.csv"));

    while(!feof($arquivo)) {
        $linha = fgets($arquivo);
        echo $linha;
        echo "<br>";
    }

    fclose($arquivo);
?>