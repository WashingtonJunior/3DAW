<?php
    include 'abrirConexao.php';

    $sql = "SELECT * FROM estado;";

    $result = $conn->query($sql);

    $rows = array();
    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    print json_encode($rows);
?>
