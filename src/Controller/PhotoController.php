<?php

namespace App\Controller;

use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PhotoController extends AbstractController
{
    /**
     * @Route("/photos", name="photos_index")
     */
    public function index(PhotoRepository $photo_repository)
    {
        $list_photos = $photo_repository->findBy(
            array(),
            array('date_publication' => 'desc')
        );
        
        return $this->render('photo/indexlist_photos.html.twig', [
            'list_photos' => $list_photos
        ]);
    }
}
