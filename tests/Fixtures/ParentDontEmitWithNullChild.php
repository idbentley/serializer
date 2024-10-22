<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ParentDontEmitWithNullChild
{
    private $c = 'c';

    private $d = 'd';

    /**
     * @var InlineChild
     */
    private $child;

    public function __construct($child = null)
    {
        $this->child = $child;
    }
}
