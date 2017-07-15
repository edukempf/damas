<?php

/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 15/07/2017
 * Time: 11:39
 */
abstract class Peca implements Movimento
{
    use ValidacaoMovimento;

    /**
     * @var integer
     */
    protected $posicaoX;

    /**
     * @var integer
     */
    protected $posicaoY;

    public function __construct($posicaoX, $posicaoY)
    {
        $this->posicaoX = $posicaoX;
        $this->posicaoY = $posicaoY;
    }

    public abstract function realizarMovimento(Peca $peca);

    /**
     * @return integer
     */
    public function getPosicaoX()
    {
        return $this->posicaoX;
    }

    /**
     * @return int
     */
    public function getPosicaoY()
    {
        return $this->posicaoY;
    }

}