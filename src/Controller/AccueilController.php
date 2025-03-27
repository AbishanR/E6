<?php

namespace App\Controller;



use App\Repository\ChatRepository;
use App\Repository\ChevalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil', methods : 'GET')]
    public function ListesChats(ChatRepository $repochat,)
    {
            $chats=$repochat->listeChatsComplete();
            return $this->render('accueil/index.html.twig', [
                'lesChats' => $chats,
            ]);
    }
   
   
    public function listesChevaux(ChevalRepository $repo)
    {
        $chevaux=$repo->listeChevauxComplete();
        return $this->render('accueil/index.html.twig', [
            'lesChevaux' => $chevaux,
        ]);
    }
}
