<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ParentEmitWithNullChild
{
    private $c = 'c';

    private $d = 'd';

    /**
     * @Serializer\EmitWhenNull()
     *
     * @var InlineChild
     */
    #[Type("InlineChild|null")]
    #[Serializer\EmitWhenNull]
    private $child;

    public function __construct($child = null)
    {
        $this->child = $child;
    }
}
