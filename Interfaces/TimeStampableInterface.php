<?php


namespace Bones\Behaviour\Timestampable\Interfaces;


interface TimeStampableInterface
{

    public function getCreatedAt();

    public function setCreatedAt(\DateTime $createdAt);

    public function getUpdatedAt();

    public function setUpdatedAt(\DateTime $createdAt);
}
