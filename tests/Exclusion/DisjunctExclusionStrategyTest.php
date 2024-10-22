<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Exclusion;

use Speakeasy\Serializer\Exclusion\DisjunctExclusionStrategy;
use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\Metadata\StaticPropertyMetadata;
use Speakeasy\Serializer\SerializationContext;
use PHPUnit\Framework\TestCase;

class DisjunctExclusionStrategyTest extends TestCase
{
    public function testShouldSkipClassShortCircuiting()
    {
        $metadata = new ClassMetadata('stdClass');
        $context = SerializationContext::create();

        $strat = new DisjunctExclusionStrategy([
            $first = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
            $last = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
        ]);

        $first->expects($this->once())
            ->method('shouldSkipClass')
            ->with($metadata, $context)
            ->willReturn(true);

        $last->expects($this->never())
            ->method('shouldSkipClass');

        self::assertTrue($strat->shouldSkipClass($metadata, $context));
    }

    public function testShouldSkipClassDisjunctBehavior()
    {
        $metadata = new ClassMetadata('stdClass');
        $context = SerializationContext::create();

        $strat = new DisjunctExclusionStrategy([
            $first = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
            $last = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
        ]);

        $first->expects($this->once())
            ->method('shouldSkipClass')
            ->with($metadata, $context)
            ->willReturn(false);

        $last->expects($this->once())
            ->method('shouldSkipClass')
            ->with($metadata, $context)
            ->willReturn(true);

        self::assertTrue($strat->shouldSkipClass($metadata, $context));
    }

    public function testShouldSkipClassReturnsFalseIfNoPredicateMatched()
    {
        $metadata = new ClassMetadata('stdClass');
        $context = SerializationContext::create();

        $strat = new DisjunctExclusionStrategy([
            $first = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
            $last = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
        ]);

        $first->expects($this->once())
            ->method('shouldSkipClass')
            ->with($metadata, $context)
            ->willReturn(false);

        $last->expects($this->once())
            ->method('shouldSkipClass')
            ->with($metadata, $context)
            ->willReturn(false);

        self::assertFalse($strat->shouldSkipClass($metadata, $context));
    }

    public function testShouldSkipPropertyShortCircuiting()
    {
        $metadata = new StaticPropertyMetadata('stdClass', 'foo', 'bar');
        $context = SerializationContext::create();

        $strat = new DisjunctExclusionStrategy([
            $first = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
            $last = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
        ]);

        $first->expects($this->once())
            ->method('shouldSkipProperty')
            ->with($metadata, $context)
            ->willReturn(true);

        $last->expects($this->never())
            ->method('shouldSkipProperty');

        self::assertTrue($strat->shouldSkipProperty($metadata, $context));
    }

    public function testShouldSkipPropertyDisjunct()
    {
        $metadata = new StaticPropertyMetadata('stdClass', 'foo', 'bar');
        $context = SerializationContext::create();

        $strat = new DisjunctExclusionStrategy([
            $first = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
            $last = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
        ]);

        $first->expects($this->once())
            ->method('shouldSkipProperty')
            ->with($metadata, $context)
            ->willReturn(false);

        $last->expects($this->once())
            ->method('shouldSkipProperty')
            ->with($metadata, $context)
            ->willReturn(true);

        self::assertTrue($strat->shouldSkipProperty($metadata, $context));
    }

    public function testShouldSkipPropertyReturnsFalseIfNoPredicateMatches()
    {
        $metadata = new StaticPropertyMetadata('stdClass', 'foo', 'bar');
        $context = SerializationContext::create();

        $strat = new DisjunctExclusionStrategy([
            $first = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
            $last = $this->getMockBuilder('Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface')->getMock(),
        ]);

        $first->expects($this->once())
            ->method('shouldSkipProperty')
            ->with($metadata, $context)
            ->willReturn(false);

        $last->expects($this->once())
            ->method('shouldSkipProperty')
            ->with($metadata, $context)
            ->willReturn(false);

        self::assertFalse($strat->shouldSkipProperty($metadata, $context));
    }
}
