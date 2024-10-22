<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\Doctrine\SingleTableInheritance;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
#[ORM\Entity]
class Teacher extends Person
{
}
