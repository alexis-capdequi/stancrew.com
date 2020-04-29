<?php

namespace App\EventSubscriber;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AddFileFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'preSetData'];
    }

    public function preSetData(FormEvent $event)
    {
        $entity = $event->getData();
        $form = $event->getForm();

        if (!$entity || null === $entity->getId()) {
            $form->add('file');
        }
        else {
            $form->add('file', FileType::class, array('required' => false, 'data_class' => null));
        }
    }
}