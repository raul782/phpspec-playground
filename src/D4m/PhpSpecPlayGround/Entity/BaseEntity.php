<?php
/**
 * @author: Raul Rodriguez - raulrodriguez782@gmail.com
 * @created: 7/6/13 - 3:12 PM
 * 
 */

namespace D4m\PhpSpecPlayGround\Entity;


abstract class BaseEntity
{
    public function __call($method, $args)
    {
        $command = substr($method, 0, 3);
        $field = lcfirst(substr($method, 3));
        if ($command == "set") {
            $this->set($field, $args);
        } else if ($command == "get") {
            return $this->get($field);
        } else {
            throw new \BadMethodCallException("There is no method ".$method." on ".get_class($this));
        }
    }

    /**
     * Sets a fields value.
     *
     * @param string $field
     * @param array $args
     *
     * @throws \BadMethodCallException - When no field exists by that name.
     * @return void
     */
    private function set($field, $args)
    {

        if ($this->hasField($field) ) {
            $this->$field = $args[0];
        } else {
            throw new \BadMethodCallException("no field with name '".$field."' exists on '".get_class($this)."'");
        }
    }

    /**
     * Get persistent field value.
     *
     *
     * @param string $field
     *
     * @throws \BadMethodCallException - When no persistent field exists by that name.
     * @return mixed
     */
    private function get($field)
    {
        if ( $this->hasField($field) ) {
            return $this->$field;
        } else {
            throw new \BadMethodCallException("no field with name '".$field."' exists on '".get_class($this)."'");
        }
    }

    protected function hasField($field)
    {
        $reflectionObject = new \ReflectionObject($this);
        $properties = $reflectionObject->getProperties();
        return in_array($field, $properties, true);
    }


}