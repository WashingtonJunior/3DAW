<?php
    $op = $_POST['sOperacao'];
    $v1 = $_POST['txtNum1'];
    $v2 = $_POST['txtNum2'];
    
    if (is_numeric($v1) && is_numeric($v2))
    {
        switch ($op)
        {
            case '+':
                $result = $v1 + $v2;
                break;
            case '-':
                $result = $v1 - $v2;
                break;
            case '*':
                $result = $v1 * $v2;
                break;
            case '/':
                if ($v2!=0)
                    $result = $v1 / $v2;
                else
                    $result = "Não é possível dividir por 0!";
                break;
        }
    }
    else
    {
        $result = "Preencha os dois valores!";
    }
  
    echo $result;
?>