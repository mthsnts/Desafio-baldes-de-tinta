<?php


namespace App\Controller;

use App\Business\ParedeBusiness;
use App\Entity\Parede;
use App\Entity\ParedesCollection;
use App\Form\ParedesCollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TesteController
 *
 * @Route("/", name="teste")
 */
class TesteController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     * @param Request $request
     * @param ParedeBusiness $paredeBusiness
     * @return Response
     */
    public function teste(Request $request, ParedeBusiness $paredeBusiness)
    {
        $paredesCollection = new ParedesCollection();
        $parede1 = new Parede();
        $parede1->setNome('Parede 1');
        $paredesCollection->getParedes()->add($parede1);
        $parede2 = new Parede();
        $parede2->setNome('Parede 2');
        $paredesCollection->getParedes()->add($parede2);
        $parede3 = new Parede();
        $parede3->setNome('Parede 3');
        $paredesCollection->getParedes()->add($parede3);
        $parede4 = new Parede();
        $parede4->setNome('Parede 4');
        $paredesCollection->getParedes()->add($parede4);
        $erros = [];
        $latas = null;

        $form = $this->createForm(ParedesCollectionType::class, $paredesCollection);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {
            $paredes = $form->getData()->getParedes();
            foreach ($paredes as $parede) {
                $validacoes = $paredeBusiness->validaRegras($parede);
                if(!empty($validacoes)){
                    $erros[] = $validacoes;
                }
            }
            if(empty($erros)){
                $areaTotalParedes = $paredeBusiness->calcularAreaTotalDasParedes($paredes);
                $latas = $paredeBusiness->calculaQuantidadeDeLatasNecessarias($areaTotalParedes);
            }
        }

        return $this->renderForm('Parede/index.html.twig', [
            'form' => $form,
            'erros' => $erros,
            'latas' => $latas
        ]);
    }
}