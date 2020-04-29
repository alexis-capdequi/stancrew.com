<?php

namespace App\Controller\App;

use App\Repository\MusicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MusicController extends AbstractController
{
    /**
     * @Route("/musiques", name="music_index")
     */
    public function index(MusicRepository $music_repository)
    {
        $music_list = $music_repository->findBy(
            array(),
            array('publication_date' => 'desc')
        );
        
        return $this->render('music/index.html.twig', [
            'music_list' => $music_list,
        ]);
    }
}
