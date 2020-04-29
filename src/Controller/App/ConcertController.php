<?php

namespace App\Controller\App;

use App\Repository\ConcertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/concerts", name="concert_index")
     */
    public function index(ConcertRepository $concert_repository)
    {
        $concerts_list = $concert_repository->findBy(
            array(),
            array('datetime' => 'desc')
        );
        
        return $this->render('concert/index.html.twig', [
            'concerts_list' => $concerts_list,
        ]);
    }
}
