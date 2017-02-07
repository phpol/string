<?php

namespace OL\String;

use OL\String\Contracts\Str as StrContract;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    /**
     * This test should instantiate with success from a string
     */
    public function test_instantiable_with_string()
    {
        // create a new instance
        $str = new Str('foo value');

        // make sure it is implementing the main contract
        $this->assertInstanceOf(StrContract::class, $str);
    }

    /**
     * This test should determine if an object of Str can be cast as a string.
     */
    public function test_object_can_be_cast_as_string()
    {
        // create a new instance
        $str = new Str('foo bar baz');

        // assert the cast value of the object is equals the initially given string.
        $this->assertEquals('foo bar baz', (string) $str);
    }

    /**
     * This test should prove an Str object can be created from another
     * Str object.
     */
    public function test_instantiable_with_str_object()
    {
        // create an initial instance
        $initialStr = new Str('foo bar');

        // create an instance passing not directly a string but an StrContract object.
        $str = new Str($initialStr);

        // assets contract implementation.
        $this->assertInstanceOf(StrContract::class, $str);
        // assets the contents are correctly passed between instances.
        $this->assertEquals('foo bar', $str->contents());
    }

    /**
     * Test replacement of parts of text, using a single string
     */
    public function test_replace_single_string()
    {
        $str = new Str('foo bar');

        $replaced = $str->replace('bar', 'baz');

        $this->assertEquals('foo baz', $replaced);
    }

    /**
     * Test replacement of parts of text, using a multiple search strings
     */
    public function test_replace_multiple_string()
    {
        $str = new Str('foo bar baz');

        $replaced = $str->replace(['bar', 'baz'], 'foo');

        $this->assertEquals('foo foo foo', $replaced);
    }
}
