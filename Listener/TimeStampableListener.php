<?php

namespace Bones\Behaviour\Timestampable\Listener;

use Bones\Behaviour\Timestampable\Interfaces\TimeStampableInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class TimeStampableListener implements EventSubscriber
{

    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist,
            Events::preUpdate,
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof TimeStampableInterface) {
            $now = new \DateTime();
            $entity->setCreatedAt($now);
            $entity->setUpdatedAt($now);
        }
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof TimeStampableInterface) {
            $now = new \DateTime();
            $entity->setUpdatedAt($now);
        }
    }
}
