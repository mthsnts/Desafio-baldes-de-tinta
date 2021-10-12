<?php


namespace Controller\Teste;

use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TesteController
 *
 * @Route("/", name="teste")
 */
class TesteController
{
    /**
     * @Route ("/", name="index", methods={"GET"})
     */
    public function teste()
    {
        dd("teste");
    }
}