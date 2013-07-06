<?php

namespace D4m\PhpSpecPlayGround\Service;

class ServiceWithEntity
{

    protected $entity;

    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    public function execute()
    {
        return $this->entity->getMemberA();
    }
}