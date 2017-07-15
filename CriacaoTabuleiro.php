<?php

/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 15/07/2017
 * Time: 13:16
 */
interface CriacaoTabuleiro
{
    public function criarTabuleiro();
    public function inserirPecaBranca($posicao, $colunas);
    public function inserirPecaPreta($posicao, $colunas);
    public function salvarTabuleiro();
}