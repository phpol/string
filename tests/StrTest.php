<?php

namespace OL\String;

use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function test_instantiable()
    {
        $str = new Str('foo value');

        $this->assertInstanceOf(Str::class, $str);
    }
}
