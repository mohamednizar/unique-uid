<?php

namespace Lsf\UniqueUid\Tests;

use Lsf\UniqueUid\UniqueUid;
use PHPUnit\Framework\TestCase;
use Prophecy\Doubler\Generator\Node\ClassNode;

class ExampleTest extends TestCase
{

    public function setUp(): void
    {
        $this->userId = new UniqueUid();
    }

    public function testOne()
    {
        $id = $this->userId::getUniqueAlphanumeric();
        $valid =$this->userId::isValidUniqueId($id);
        $this->assertEquals(true,$valid);
    }

    public function testTest()
    {
        $number = 1000;
        while ($number >= 0) {
            $number--;
            $this->testOne();
        }
    }

    public function testInvalid(){
        $valid =$this->userId::isValidUniqueId('CYJ-DGQ-331');
        $this->assertEquals(false,$valid);
        $valid2 =$this->userId::isValidUniqueId('7K3-7M8-CR5');
        $this->assertEquals(false,$valid2);
        $valid3 =$this->userId::isValidUniqueId('DTT-8JD-3Y0');
        $this->assertEquals(false,$valid3);
       
       
    }

    public function testArrayInput() {
        try {
            $this->throwException($this->userId::isValidUniqueId([]));
        } catch (\Exception $ex) {
            var_dump($ex->getMessage());
            $this->assertEquals($ex->getMessage(), "strlen() expects parameter 1 to be string, array given");
        }
    
    }

    public function testValidCharacters()
    {
        $this->assertEquals('2346789BCDFGHJKMPQRTVWXY', $this->userId::$charSet);
    }
}
