<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Candidates\calcSum;

class CandidateTest extends TestCase
{
    public function testCandidate(){
        $this->assertEquals(5,calcSum([1,4]));
        $this->assertEquals(0,calcSum());
    }

}