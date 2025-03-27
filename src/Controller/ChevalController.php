<?php

namespace App\Controller;

use App\Entity\Cheval;
use App\Repository\ChevalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChevalController extends AbstractController
{
    #[Route('/chevaux', name: 'cheval', methods : 'GET')]
    public function listesChevaux(ChevalRepository $repo)
    {
        $chevaux=$repo->listeChevauxComplete();
        return $this->render('cheval/listeChevaux.html.twig', [
            'lesChevaux' => $chevaux,
        ]);
    }

    #[Route('/cheval/{id}', name: 'ficheCheval', methods :'GET')]
    public function ficheCheval(Cheval $cheval)
    {   
        return $this->render('cheval/ficheCheval.html.twig', [
            'leCheval' => $cheval
        ]);
    }

}