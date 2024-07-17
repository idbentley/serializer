<?php

declare(strict_types=1);

namespace JMS\Serializer\Tests\Fixtures;

use JMS\Serializer\Annotation\Type;

class MappedDiscriminatedComment
{
    /**
     * @Type("JMS\Serializer\Tests\Fixtures\Author")
     */
    #[Type(name: 'JMS\Serializer\Tests\Fixtures\Author')]
    private $author;

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $text;

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $objectType = 'comment';

    public function __construct(?Author $author, $text)
    {
        $this->author = $author;
        $this->text = $text;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getObjectType()
    {
        return $this->objectType;
    }
}
