<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "cidades_3daw";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
    }

    $estado = $_GET["estado"];

    //passar o comando sql para ler a tabela
    $query = "SELECT * FROM estado where uf='$estado'";
    $result = $conn->query($query);
    $linha = $result->fetch_assoc();
    $idEstado = $linha["id"];


    $query2 = "SELECT * FROM cidade where estado = $idEstado";
    $result2 = $conn->query($query2);

    $cidades = array();
    echo "[";
    $cidade = mysqli_fetch_assoc($result2);
    while ($cidade)
    {
        echo '{"id": "' . $cidade['id'] . '", ';
        echo '"nome": "' . $cidade['nome'] . '", ';
        echo '"estado": "' . $cidade['estado'] . '"}';

        $cidade = mysqli_fetch_assoc($result2);
        if ($cidade)
            echo ", ";
    }
    echo "]";

    //echo json_encode($cidades);

?>