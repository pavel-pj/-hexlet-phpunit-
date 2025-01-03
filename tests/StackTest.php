<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Stack\make;
use function Hexlet\Phpunit\Stack\push;
use function Hexlet\Phpunit\Stack\pop;
use function Hexlet\Phpunit\Stack\isEmpty;
use \Exception;


class StackTest extends TestCase
{
    public function testMainFlow(): void
    {
        $stack =  make();
        // Добавляем два элемента в стек и затем извлекаем их
        push($stack, 'one');
        push($stack, 'two');

        $value1 =  pop($stack);
        $this->assertEquals('two', $value1);
        $value2 =  pop($stack);
        $this->assertEquals('one', $value2);
    }

    public function testIsEmpty(): void
    {
        $stack =  make();
        $this->assertTrue( isEmpty($stack));
         push($stack, 'one');
        $this->assertFalse( isEmpty($stack));
         pop($stack);
        $this->assertTrue( isEmpty($stack));
    }

    public function testPop(): void
    {
        // Ожидание ставится до вызова кода
        $this->expectException(\Exception::class);

        $stack =  make();
        pop($stack); // Boom!
    }
}
