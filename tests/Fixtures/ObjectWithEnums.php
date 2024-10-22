<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;
use Speakeasy\Serializer\Tests\Fixtures\Enum\BackedSuit;
use Speakeasy\Serializer\Tests\Fixtures\Enum\BackedSuitInt;
use Speakeasy\Serializer\Tests\Fixtures\Enum\Suit;

class ObjectWithEnums
{
    /**
<<<<<<< Updated upstream
     * @Serializer\Type("enum<'JMS\Serializer\Tests\Fixtures\Enum\Suit', 'name'>")
=======
     * @Serializer\Type("enum<Speakeasy\Serializer\Tests\Fixtures\Enum\Suit, 'name'>")
>>>>>>> Stashed changes
     */
    public Suit $ordinary;

    /**
<<<<<<< Updated upstream
     * @Serializer\Type("enum<'JMS\Serializer\Tests\Fixtures\Enum\BackedSuit', 'value'>")
=======
     * @Serializer\Type("enum<Speakeasy\Serializer\Tests\Fixtures\Enum\BackedSuit, 'value'>")
>>>>>>> Stashed changes
     */
    public BackedSuit $backedValue;

    /**
<<<<<<< Updated upstream
     * @Serializer\Type("enum<'JMS\Serializer\Tests\Fixtures\Enum\BackedSuit'>")
=======
     * Deprecated, remove single quote around type with 4.0.
     *
     * @Serializer\Type("enum<'Speakeasy\Serializer\Tests\Fixtures\Enum\BackedSuit'>")
>>>>>>> Stashed changes
     */
    public BackedSuit $backedWithoutParam;

    /**
<<<<<<< Updated upstream
     * @Serializer\Type("array<enum<'JMS\Serializer\Tests\Fixtures\Enum\Suit'>>")
=======
     * @Serializer\Type("array<enum<Speakeasy\Serializer\Tests\Fixtures\Enum\Suit>>")
>>>>>>> Stashed changes
     */
    public array $ordinaryArray;

    /**
<<<<<<< Updated upstream
     * @Serializer\Type("array<enum<'JMS\Serializer\Tests\Fixtures\Enum\BackedSuit', 'value'>>")
=======
     * @Serializer\Type("array<enum<Speakeasy\Serializer\Tests\Fixtures\Enum\BackedSuit, 'value'>>")
>>>>>>> Stashed changes
     */
    public array $backedArray;

    /**
<<<<<<< Updated upstream
     * @Serializer\Type("array<enum<'JMS\Serializer\Tests\Fixtures\Enum\BackedSuit'>>")
=======
     * @Serializer\Type("array<enum<Speakeasy\Serializer\Tests\Fixtures\Enum\BackedSuit>>")
>>>>>>> Stashed changes
     */
    public array $backedArrayWithoutParam;

    public Suit $ordinaryAutoDetect;

    public BackedSuit $backedAutoDetect;

    public BackedSuitInt $backedIntAutoDetect;

    public BackedSuitInt $backedInt;

    public BackedSuit $backedName;

    public BackedSuitInt $backedIntForcedStr;

    public function __construct()
    {
        $this->ordinary = Suit::Clubs;

        $this->backedValue = BackedSuit::Clubs;
        $this->backedWithoutParam = BackedSuit::Clubs;

        $this->backedArray = [BackedSuit::Clubs, BackedSuit::Hearts];
        $this->backedArrayWithoutParam = [BackedSuit::Clubs, BackedSuit::Hearts];
        $this->ordinaryArray = [Suit::Clubs, Suit::Spades];

        $this->ordinaryAutoDetect = Suit::Clubs;
        $this->backedAutoDetect = BackedSuit::Clubs;
        $this->backedIntAutoDetect = BackedSuitInt::Clubs;

        $this->backedName = BackedSuit::Clubs;
        $this->backedInt = BackedSuitInt::Clubs;
        $this->backedIntForcedStr = BackedSuitInt::Clubs;
    }
}
