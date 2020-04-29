<?php

namespace App\EventSubscriber;

use App\Entity\Picture;
use App\Entity\Video;
use App\Entity\Music;
use App\Entity\Mail;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class EntitySubscriber implements EventSubscriber
{
    private $file_uploader;
    
    public function __construct(FileUploader $file_uploader) {
        $this->file_uploader = $file_uploader;
    }
    
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preRemove,
            Events::preUpdate,
        ];
    }
    
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $class_name = str_replace('App\Entity\\', '', get_class($entity));
        
        
        if (in_array($class_name, array('Picture', 'Video', 'Music'))){
            $file = $entity->getFile();
            
            if ($file instanceof UploadedFile) {
                $entity
                    ->setFile($this->file_uploader->upload($file, $class_name))
                    ->setPublicationDate(new \DateTime());
            }
        }
        elseif($class_name == 'Mail') {
            $entity->setSendingDate(new \DateTime());
        }
    }
    
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $class_name = str_replace('App\Entity\\', '', get_class($entity));
        
        if (in_array($class_name, array('Picture', 'Video', 'Music'))){
            $file = $entity->getFile();
            $old_file = $args->getOldValue('file');

            if ($file instanceof UploadedFile) {
                $entity->setFile($this->file_uploader->upload($file, $class_name));
                $this->file_uploader->remove($old_file, $class_name);
            }
            else {
                $entity->setFile($old_file);
            }
        }
    }
    
    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $class_name = str_replace('App\Entity\\', '', get_class($entity));
        
        if (in_array($class_name, array('Picture', 'Video', 'Music'))){
            $file = $entity->getFile();
            $this->file_uploader->remove($file, $class_name);
        }
    }
}