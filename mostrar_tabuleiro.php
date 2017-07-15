<html>
<head></head>
<body>
<?php

include_once 'ValidacaoMovimento.php';
include_once 'Movimento.php';
include_once 'CriacaoTabuleiro.php';
include_once 'Peca.php';
include_once 'PecaBranca.php';
include_once 'PecaPreta.php';
include_once 'Tabuleiro.php';

$posicoes_iniciais_brancas = array("0,1", "0,3", "0,5", "0,7", "1,0", "1,2", "1,4", "1,6", "2,1", "2,3", "2,5", "2,7");
$posicoes_iniciais_pretas = array("5,0", "5,2", "5,4", "5,6", "6,1", "6,3", "6,5", "6,7", "7,0", "7,2", "7,4", "7,6");
if (!file_exists("tabuleiro.json")) {
    $tabuleiro = new Tabuleiro(8,8,12,$posicoes_iniciais_brancas,$posicoes_iniciais_pretas);
}
    $tabuleiro = json_decode(file_get_contents("tabuleiro.json"), true);
    $corUM = true;
    echo '<table border="1">';
    foreach ($tabuleiro as $X => $colunas):
        ?>
        <tr>
            <?php
            foreach ($colunas as $Y => $casa):
                if ($corUM) {
                    $corCasa = 'white';
                    $corTexto = 'black';
                } else {
                    $corCasa = 'black';
                    $corTexto = 'white';
                }
                echo '<td style="height: 25px;width: 25px;text-align: center;background-color: ' . $corCasa . ';color:'.$corTexto.';">' . ($casa == null) ? ' ' :  $casa[0] . '  </td>';
                $corUM = !$corUM;
            endforeach;
            $corUM = !$corUM;
            ?>
        </tr>
        <?php
    endforeach;
    echo '</table>';
?>
</body>
</html>