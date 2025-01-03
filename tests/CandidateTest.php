<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Candidates\getFilteredGender;
use function Hexlet\Phpunit\Candidates\getNames;
use function Hexlet\Phpunit\Candidates\getBirthdayByName;
use function Hexlet\Phpunit\Candidates\printValue;

use Illuminate\Collection;

class CandidateTest extends TestCase
{
    public function testCandidate(){

        $users = [
            ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
            ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
            ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
            ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03'],
            ['name' => 'Jon', 'gender' => 'male', 'birthday' => '1980-11-03'],
            ['name' => 'Robb','gender' => 'male', 'birthday' => '1980-05-14'],
            ['name' => 'Tisha', 'gender' => 'female', 'birthday' => '2012-11-03'],
            ['name' => 'Rick', 'gender' => 'male', 'birthday' => '2012-11-03'],
            ['name' => 'Joffrey', 'gender' => 'male', 'birthday' => '1999-11-03'],
            ['name' => 'Edd', 'gender' => 'male', 'birthday' => '1973-11-03']
        ];
        $expected1 = getFilteredGender($users,'male');
        $this->assertCount(8,  $expected1);

        $expected2 = getFilteredGender($users,'female');
        $this->assertCount(2,  $expected2);

        $expected3 = getNames([]);
        $this->assertEmpty($expected3);

        $expected4 = getNames(getFilteredGender($users,'female'));
        $this->assertCount(2,  $expected4);
        $this->assertNotEmpty(2,  $expected4);
        $this->assertEqualsCanonicalizing(collect(['Tisha','Sansa']),  $expected4);

        $expected5 = getNames(getFilteredGender($users,'male'));
        $this->assertCount(8,$expected5);
        $this->assertContains('Joffrey',$expected5);

        $expected6 = printValue( getBirthdayByName($users,'Tisha'));
        $this->expectOutputString( "[{\"birthday\":\"2012-11-03\"}]"  , $expected6);

        $this->expectException(\Exception::class);
        $expected7 =  getBirthdayByName($users,'NoName');
        $this->expectOutputString( "[{\"birthday\":\"2012-11-03\"}]"  , $expected7);

         

    }

}