<?php

namespace App\Controller;

use App\Repository\ConcertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/concerts", name="concert")
     */
    public function index(ConcertRepository $concert_repository)
    {
        $list_concerts = $concert_repository->findBy(
            array(),
            array('datetime' => 'desc')
        );
        
        return $this->render('concert/index.html.twig', [
            'list_concerts' => $list_concerts,
        ]);
    }
}
