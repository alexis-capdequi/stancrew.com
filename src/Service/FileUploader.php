<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $pictures_images_directory;
    private $videos_images_directory;
    private $music_directory;
    private $target_directory;

    public function __construct($pictures_images_directory, $videos_images_directory, $music_directory)
    {
        $this->pictures_images_directory = $pictures_images_directory;
        $this->videos_images_directory = $videos_images_directory;
        $this->music_directory = $music_directory;
        $this->target_directory = '';
    }

    public function upload(UploadedFile $file, string $entity)
    {   
        $filename = uniqid().'.'.$file->guessExtension();
        
        try {
            $file->move($this->getTargetDirectory($entity), $filename);
        } catch (FileException $e) {
            
        }

        return $filename;
    }
    
    public function remove(string $filename, string $entity) {
        $file_path = $this->getTargetDirectory($entity).'/'.$filename;
        
        if(!unlink($file_path)) {
            
        }
    }
    
    public function getTargetDirectory(string $entity) {
        $target_directory = '';
        
        switch ($entity) {
            case 'Picture':
                $target_directory = $this->pictures_images_directory;
                break;
            case 'Video':
                $target_directory = $this->videos_images_directory;
                break;
            case 'Music':
                $target_directory = $this->music_directory;
                break;
        }
        
        return $target_directory;
    }
}