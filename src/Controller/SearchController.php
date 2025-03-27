<?php
// src/Controller/SearchController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search_results")
     */
    public function search(Request $request): Response
    {
        $query = $request->query->get('query');
        
        // Simulez une recherche en fonction de la requête
        $allItems = ['Chien', 'Chat', 'Cheval'];
        $results = [];

        foreach ($allItems as $item) {
            if (stripos($item, $query) !== false) {
                $results[] = $item;
            }
        }

        return $this->render('search/results.html.twig', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
