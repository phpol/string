<?php

namespace OL\String\Contracts;

/**
 * Interface Str.
 *
 * This interface should be the core interface for all string related classes.
 * Other classes within this component should (when possible) extend this one.
 */
interface Str
{
    /**
     * Str constructor.
     *
     * The constructor will enforce string type, since it can also receive
     * another Str object (self) as it can be casted to string.
     *
     * @param string|Str $payload The actual string
     */
    public function __construct(string $payload);

    /**
     * Str objects should should be able to be cast as string.
     *
     * @return string The actual string
     */
    public function __toString();

    /**
     * Public method to retrieve the raw string contents of an object.
     *
     * @return string
     */
    public function contents();

    /**
     * Replace one or more entries from the given object with a given value
     *
     * @param array|string $search What to search for
     * @param string $replace Replace with?
     *
     * @return Str
     */
    public function replace($search, string $replace);
}
