<?php

namespace App\Controller;

use App\Repository\PhotoRepository;
use App\Repository\AlbumPhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PhotoController extends AbstractController
{
    /**
     * @Route("/photos", name="photo_list")
     */
    public function listPhotos(PhotoRepository $photo_repository, AlbumPhotosRepository $album_photo_repository)
    {
        $list_photos = $photo_repository->findBy(
            array(),
            array('date_publication' => 'desc')
        );
        
        $albums_photos = $album_photo_repository->findBy(
            array(),
            array('date_publication' => 'desc')
        );
        
        return $this->render('photo/list_photos.html.twig', [
            'list_photos' => $list_photos,
            'albums_photos' => $albums_photos
        ]);
    }
    
    /**
     * @Route("/photos/albums", name="photo_albums")
     */
    public function listAlbums(Request $request, PhotoRepository $photo_repository, AlbumPhotosRepository $album_photo_repository)
    {
        $code_album = $request->get('codeAlbum');
        
        if (isset($code_album) && !empty($code_album)) {
            $list_photos = $photo_repository->findByAlbum($code_album);
        
            $album_photos = $album_photo_repository->findOneBy(
                array('code' => $code_album)
            );
            
            return $this->render('photo/list_photos.html.twig', [
                'list_photos' => $list_photos,
                'album_photos' => $album_photos
            ]);
        }
        
        $list_albums = $album_photo_repository->findBy(
            array(),
            array('date_publication' => 'desc')
        );
        
        return $this->render('photo/list_albums.html.twig', [
            'list_albums' => $list_albums
        ]);
    }
}
