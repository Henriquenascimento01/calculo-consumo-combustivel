<?php

$message = "";

if ($_POST) {

    $distance = $_POST['distancia'];
    $autonomy = $_POST['autonomia'];


    if (is_numeric($autonomy) && is_numeric($distance)) {

        if ($distance > 0 && $autonomy > 0) {

            $valueGasoline = 5.50;
            $valueDiesel = 6.29;
            $valueAlcool = 4.60;

            $calculateGasolina = ($distance / $autonomy) * $valueGasoline;
            $calculateDiesel = ($distance / $autonomy) * $valueDiesel;
            $calculateAlcool = ($distance / $autonomy) * $valueAlcool;

            $calculateDiesel = number_format($calculateDiesel, 2, ",", ".");
            $calculateGasolina = number_format($calculateGasolina, 2, ",", ".");
            $calculateAlcool = number_format($calculateAlcool, 2, ",", ".");

            $message .= "O valor gasto será de: ";

            $message .= "<li><b>Diesel:</b> R$ " . $calculateDiesel . "</li>";
            $message .= "<li><b>Gasolina:</b> R$ " . $calculateGasolina . "</li>";
            $message .= "<li><b>Alcool:</b> R$ " . $calculateAlcool . "</li>";
        } else {
            $message .= "<p> Valores zerados não são aceitos </p>";
        };
    } else {
        $message .= "<p> Os valores informados não são numéricos.</p>";
    }
} else {

    $message .= "<div class='error'>";
    $message .= "<p> Nenhum dado preenchido no formulário.</p>";
    $message .= "</div>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo consumo de combustivel</title>
    <link rel="stylesheet" type="text/css" href="style.css" </head>

<body>
    <main>
        <div class="painel">
            <h2>Resultado do cálculo de consumo</h2>
            <div class="conteudo-painel">
                <?php
                echo $message
                ?>
                <a class="botao" href="index.php">Voltar</a>
            </div>
        </div>
    </main>
</body>

</html>