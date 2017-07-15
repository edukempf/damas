<?php

/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 15/07/2017
 * Time: 11:39
 */
final class Tabuleiro implements CriacaoTabuleiro
{
    /**
     * @var integer
     */
    private $numeroPecas;

    /**
     * @var integer
     */
    private $linhas;

    /**
     * @var integer
     */
    private $colunas;

    /**
     * @var array
     */
    private $posicoesIniciasBrancas;

    /**
     * @var array
     */
    private $posicoesIniciaisPretas;

    /**
     * @var array
     */
    private $posicoes;

    /**
     * Tabuleiro constructor.
     * @param $linhas
     * @param $colunas
     * @param $numeroPecas
     * @param $posicoesIniciasBrancas
     * @param $posicoesIniciasPretas
     */
    public function __construct($linhas, $colunas, $numeroPecas, $posicoesIniciasBrancas, $posicoesIniciasPretas)
    {
        $this->linhas = $linhas;
        $this->colunas = $colunas;
        $this->numeroPecas = $numeroPecas;
        $this->posicoesIniciasBrancas = $posicoesIniciasBrancas;
        $this->posicoesIniciaisPretas = $posicoesIniciasPretas;
        $this->criarTabuleiro();
        $this->salvarTabuleiro();
    }

    public function criarTabuleiro()
    {
        for ($i = 0; $i < $this->linhas; $i++) {
            $colunas = array();
            for ($j = 0; $j < $this->colunas; $j++) {
                $posicao = $i . "," . $j;
                if (in_array($posicao, $this->posicoesIniciasBrancas))
                    $colunas = $this->inserirPecaBranca($posicao, $colunas);
                else if (in_array($posicao, $this->posicoesIniciaisPretas))
                    $colunas = $this->inserirPecaPreta($posicao, $colunas);
                else
                    array_push($colunas,null);
            }
            $this->posicoes[] = $colunas;
        }
    }

    public function inserirPecaBranca($posicao, $colunas)
    {
        $posicaoX = explode(',', $posicao)[0];
        $posicaoY = explode(',', $posicao)[1];
        $pecaBranca = new PecaBranca($posicaoX, $posicaoY);
        array_push($colunas, $pecaBranca);
        return $colunas;
    }

    public function inserirPecaPreta($posicao, $colunas)
    {
        $posicaoX = explode(',', $posicao)[0];
        $posicaoY = explode(',', $posicao)[1];
        $pecaPreta = new PecaPreta($posicaoX, $posicaoY);
        array_push($colunas, $pecaPreta);
        return $colunas;
    }

    public function salvarTabuleiro()
    {
        try{
            file_put_contents("tabuleiro.json", json_encode($this->posicoes));
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    /**
     * @return array
     */
    public function getPosicoes()
    {
        return $this->posicoes;
    }
}