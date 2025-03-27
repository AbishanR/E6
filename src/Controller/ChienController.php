<?php

namespace App\Controller;

use App\Entity\Chien;
use App\Repository\ChienRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChienController extends AbstractController
{
    #[Route('/chien', name: 'chien', methods : 'GET')]
    public function listeChiens(ChienRepository $repo)
    {
        $chiens=$repo->listeChiensComplete();
        return $this->render('chien/listeChiens.html.twig', [
            'lesChiens' => $chiens,
        ]);
    }

    
    #[Route('/chien/{id}', name: 'ficheChien', methods :'GET')]
    public function ficheChien(Chien $chien)
    {   
        return $this->render('chien/ficheChien.html.twig', [
            'leChien' => $chien
        ]);
    }
}
