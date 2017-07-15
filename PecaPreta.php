<?php

/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 15/07/2017
 * Time: 11:40
 */
class PecaPreta extends Peca
{

    public function __construct($posicaoX, $posicaoY)
    {
        parent::__construct($posicaoX, $posicaoY);
    }

    public function realizarMovimento(Peca $peca)
    {
        // TODO: Implement realizarMovimento() method.
    }

    public function salvarStatus()
    {
        // TODO: Implement salvarStatus() method.
    }

    public function __toString()
    {
        return "P";
    }
}