<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DoctrinePHPCR;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
<<<<<<< Updated upstream
use JMS\Serializer\Annotation\SerializedName;
=======
use Doctrine\ODM\PHPCR\Mapping\Attributes\Document;
use Doctrine\ODM\PHPCR\Mapping\Attributes\Field;
use Doctrine\ODM\PHPCR\Mapping\Attributes\Id;
use Speakeasy\Serializer\Annotation\SerializedName;
>>>>>>> Stashed changes

/** @PHPCRODM\Document */
class Author
{
    /**
     * @PHPCRODM\Id()
     */
    protected $id;

    /**
     * @PHPCRODM\Field(type="string")
     * @SerializedName("full_name")
     */
    #[SerializedName(name: 'full_name')]
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
