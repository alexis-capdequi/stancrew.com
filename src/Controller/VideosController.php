<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class VideosController extends AbstractController
{
    /**
     * @Route("/videos", name="videos_index")
     */
    public function index(VideoRepository $video_repository)
    {
        $videos_list = $video_repository->findBy(
            array(),
            array('publication_date' => 'desc')
        );
        
        return $this->render('videos/list_videos.html.twig', [
            'videos_list' => $videos_list,
        ]);
    }
    
    /**
     * @Route("/videos/{type}", name="videos_by_type")
     */
    public function videosByType(string $type, VideoRepository $video_repository)
    {
        $videos_list = $video_repository->findBy(
            array('type' => $type),
            array('publication_date' => 'desc')
        );
        
        return $this->render('videos/list_videos.html.twig', [
            'videos_list' => $videos_list,
        ]);
    }
    
    /**
     * @Route("/videos/watch", name="videos_watch")
     */
    public function watchVideo(Request $request, VideoRepository $video_repository)
    {
        $type = $request->get('type');
        $video_code = $request->get('codeVideo');
        
        if (isset($type) && !empty($type)) {
            $videos_list = $video_repository->findBy(
                array('type' => $type),
                array('publication_date' => 'desc')
            );
        } else {
            $videos_list = $video_repository->findBy(
                array(),
                array('publication_date' => 'desc')
            );
        }
        
        $video = $video_repository->findOneBy(
            array('code' => $video_code)
        );
        
        return $this->render('videos/watch.html.twig', [
            'videos_list' => $videos_list,
            'video' => $video
        ]);
    }
}
