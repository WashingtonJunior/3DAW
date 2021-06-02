<?php
    include 'abrirConexao.php';

    $estado = $_GET['estado'];

    $sql = "SELECT * FROM cidade WHERE estado=$estado;";

    $result = $conn->query($sql);

    $rows = array();
    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    print json_encode($rows);

?>