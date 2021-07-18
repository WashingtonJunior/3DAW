<?php
    include 'abrirConexao.php';

    $estado = $_GET['estado'];

    $sql = "SELECT * FROM cidade WHERE estado=$estado;";

    $result = $conn->query($sql);
	
    $cidades = array();
    while ($cidade = mysqli_fetch_assoc($result))
    {
		print($cidade['nome']);
        $cidades[] = $cidade;
    }

    print json_encode($cidade);

?>