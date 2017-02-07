<?php

namespace OL\String;

use OL\String\Contracts\Str as StrContract;

/**
 * Class Str.
 *
 * Basic manipulation of strings.
 */
class Str implements StrContract
{
    /**
     * @var string Raw string content
     */
    protected $payload;

    /**
     * Str constructor.
     *
     * The constructor will enforce string type, since it can also receive
     * another Str object (self) as it can be casted to string.
     *
     * @param string|StrContract $payload The actual string
     */
    public function __construct(string $payload)
    {
        // casts the payload as string and them assign on class scope
        $this->payload = (string) $payload;
    }

    /**
     * Str objects should should be able to be cast as string.
     *
     * @return string The actual string
     */
    public function __toString()
    {
        return $this->contents();
    }

    /**
     * Public method to retrieve the raw string contents of an object.
     *
     * @return string
     */
    public function contents()
    {
        return $this->payload;
    }

    /**
     * Replace one or more entries from the given object with a given value
     *
     * @param array|string $search What to search for
     * @param string $replace Replace with?
     *
     * @return StrContract Object instance with the replaced text.
     */
    public function replace($search, string $replace)
    {
        return $this->factory(str_replace($search, $replace, $this));
    }

    /**
     * Factories a new StrContract object.
     *
     * @param string $str Instance to be factory from
     *
     * @return StrContract
     */
    protected function factory(string $str)
    {
        return new self($str);
    }
}
