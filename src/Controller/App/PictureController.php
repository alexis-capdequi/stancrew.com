<?php

namespace App\Controller\App;

use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PictureController extends AbstractController
{
    /**
     * @Route("/photos", name="pictures_index")
     */
    public function index(PictureRepository $picture_repository)
    {
        $pictures_list = $picture_repository->findBy(
            array(),
            array('publication_date' => 'desc')
        );
        
        return $this->render('pictures/index.html.twig', [
            'pictures_list' => $pictures_list
        ]);
    }
}
