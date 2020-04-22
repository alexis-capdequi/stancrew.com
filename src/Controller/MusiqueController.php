<?php

namespace App\Controller;

use App\Repository\MusiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MusiqueController extends AbstractController
{
    /**
     * @Route("/musiques", name="musique")
     */
    public function index(MusiqueRepository $musique_repository)
    {
        $list_musiques = $musique_repository->findBy(
            array(),
            array('date_publication' => 'desc')
        );
        
        return $this->render('musique/index.html.twig', [
            'list_musiques' => $list_musiques,
        ]);
    }
}
