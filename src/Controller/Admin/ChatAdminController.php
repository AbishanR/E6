<?php

namespace App\Controller\Admin;

use App\Entity\Chat;
use App\Form\ChatType;
use App\Form\FiltreAnimauxType;
use App\Repository\ChatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChatAdminController extends AbstractController
{
    #[Route('/admin/chats', name: 'admin_chats', methods :'GET')]
    public function listeChats(ChatRepository $repo, PaginatorInterface $paginator, Request $request)
    {
        $FiltreAnimauxType=$this->createForm(FiltreAnimauxType::class);
        $FiltreAnimauxType->handleRequest($request);
        if($FiltreAnimauxType->isSubmitted() && $FiltreAnimauxType->isValid())
            $nom=$FiltreAnimauxType->getData()['nom'];
        {
            $chats=$paginator->paginate(
                $repo->listeChatsComplete(),
                $request->query->getInt('page', 1), /*page number*/
                8 /*limit per page*/
            );
            return $this->render('admin/chat_admin/listeChat.html.twig', [
                'lesChats' => $chats,
                'formFiltreALbums' => $FiltreAnimauxType->createView()
            ]);
        }
        $chats=$paginator->paginate(
        $repo->listeChatsComplete(),
        $request->query->getInt('page', 1), /*page number*/
        8 /*limit per page*/
        );
        return $this->render('admin/chat_admin/listeChat.html.twig', [
            'lesChats' => $chats,
            'formFiltreALbums' => $FiltreAnimauxType->createView()
        ]);
    }

    #[Route('/admin/chats/ajout', name: 'admin_chat_ajout', methods :['GET', 'POST'])]
    #[Route('/admin/chats/modif/{id}', name: 'admin_chat_modif', methods :['GET', 'POST'])]
    public function ajoutModifChat(Chat $chat=null, Request $request, EntityManagerInterface $manager)
    {
        if($chat==null){
            $chat=new Chat();
            $mode="ajouté";
        }else{
            $mode="modifié";
        }

        $form=$this->createForm(ChatType::class,$chat);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($chat);
            $manager->flush();
            $this->addFlash("success", "Le produit a bien été $mode");
            return $this->redirectToRoute('admin_chats');
        }
        return $this->render('admin/chat_admin/formChat.html.twig', [
            'formChat' => $form->createView()
        ]);
    }


    #[Route('/admin/chats/supression/{id}', name: 'admin_chat_supression', methods :'GET')]
    public function supressionChat(Chat $chat, EntityManagerInterface $manager)
    {
            $manager->remove($chat);
            $manager->flush();
            $this->addFlash("success", "Le produit a bien été supprimé");
        return $this->redirectToRoute('admin_chats');
    }
    
}