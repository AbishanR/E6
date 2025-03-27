<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Repository\ChatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChatController extends AbstractController
{
    #[Route('/chat', name: 'chat', methods : 'GET')]

    public function ListesChats(ChatRepository $repo)
    {
        $chats=$repo->listeChatsComplete();/* query NOT result */
        return $this->render('chat/listeChat.html.twig', [
            'lesChats' => $chats,
        ]);
    }

    #[Route("/chat/{id}", name: 'ficheChat', methods :'GET')]
    public function ficheChats(Chat $chat)
    {
        return $this->render('chat/ficheChat.html.twig', [
            'leChat' => $chat
        ]);
    }

    
   
}
