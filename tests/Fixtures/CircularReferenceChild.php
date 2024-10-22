<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class CircularReferenceChild
{
    /** @Type("string") */
    #[Type(name: 'string')]
    private $name;

    /** @Type("Speakeasy\Serializer\Tests\Fixtures\CircularReferenceParent") */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\CircularReferenceParent')]
    private $parent;

    public function __construct($name, CircularReferenceParent $parent)
    {
        $this->name = $name;
        $this->parent = $parent;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(CircularReferenceParent $parent)
    {
        $this->parent = $parent;
    }
}
