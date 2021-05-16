<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "faeterj3dawn";

        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        if ($conn->connect_error) {
            die("Conexão com erro: " . $conn->connect_error);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leitura DB</title>
</head>
<body>
<h3>Leitura DB</h3>
<form action="Listar.php" method="post">
    <input type="submit" name="op" value="Listar Alunos" >
    <br>
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM alunos;";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>id</th><th>nome</th><th>email</th><th>matricula</th>";
    while ($linha = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> " . $linha["id"] . "</td>";
        echo "<br>";
        echo "<td> " . $linha["nome"] . "</td>";
        echo "<br>";
        echo "<td> " . $linha["email"] . "</td>";
        echo "<br>";
        echo "<td> " . $linha["matricula"] . "</td>";
        echo "<br>";
        echo "<tr>";
    }
    echo "</table>";
}
?>