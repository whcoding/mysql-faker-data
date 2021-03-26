<?php

namespace Tests;

use App\Index;
use PHPUnit\Framework\TestCase;

class TestDemo extends TestCase
{
    public function testItGatDemo()
    {
        $index = new Index;
        $test  = $index->index();
        $this->assertTrue(1 == $test);
    }

}