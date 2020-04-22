<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class VideoController extends AbstractController
{
    /**
     * @Route("/videos", name="video_list")
     */
    public function listVideos(VideoRepository $video_repository)
    {
        $list_videos = $video_repository->findBy(
            array(),
            array('date_publication' => 'desc')
        );
        
        return $this->render('video/list_videos.html.twig', [
            'list_videos' => $list_videos,
        ]);
    }
    
    /**
     * @Route("/videos/{categorie_videos}", name="video_by_category")
     */
    public function listVideosByAlbum(string $categorie_videos, VideoRepository $video_repository)
    {
        $list_videos = $video_repository->findBy(
            array('categorie_videos' => $categorie_videos),
            array('date_publication' => 'desc')
        );
        
        return $this->render('video/list_videos.html.twig', [
            'list_videos' => $list_videos,
        ]);
    }
    
    /**
     * @Route("/videos/watch", name="video_watch")
     */
    public function showVideo(Request $request, VideoRepository $video_repository)
    {
        $categorie_videos = $request->get('categorie');
        $code_video = $request->get('codeVideo');
        
        if (isset($code_categorie) && !empty($code_categorie)) {
            $list_videos = $video_repository->findBy(
                array('categorie_videos' => $categorie_videos),
                array('date_publication' => 'desc')
            );
        } else {
            $list_videos = $video_repository->findBy(
                array(),
                array('date_publication' => 'desc')
            );
        }
        
        $video = $video_repository->findOneBy(
            array('code' => $code_video)
        );
        
        return $this->render('video/watch.html.twig', [
            'list_videos' => $list_videos,
            'video' => $video
        ]);
    }
}
