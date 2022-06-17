<?php

if (! function_exists('is_blank')) {
    /**
     * Determine if the given value is "empty" or "blank"
     *
     * @param  mixed  $value
     * @return bool
     */
    function is_blank($value): bool
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if ($value instanceof Countable) {
            return count($value) === 0;
        }

        return empty($value);
    }
}

if (! function_exists('is_assoc')) {
    /**
     * Determines if array is "associative" or "sequential"
     *
     * @param  array  $array
     * @return bool
     */
    function is_assoc(array $array): bool
    {
        $keys = array_keys($array);

        return $keys !== array_keys($keys);
    }
}

if (! function_exists('str_matches_pattern')) {
    /**
     * Check if string matched the given regex pattern
     *
     * @param  string  $str
     * @param  string  $regex
     * @return bool
     */
    function str_matches_pattern(string $str, string $regex): bool
    {
        return preg_match($regex, $str, $matches) === 1 && $matches[0] === $str;
    }
}

if (! function_exists('multi_array_unique')) {
    /**
     * Returns unique array of a multidimensional array
     *
     * @param  array  $array
     * @return array
     */
    function multi_array_unique(array $array): array
    {
        $uniqueArray = array_intersect_key(
            $array,
            array_unique(array_map('serialize', $array))
        );

        return array_values($uniqueArray);
    }
}

if (! function_exists('timezones')) {
    /**
     * Returns list of PHP timezones
     *
     * @return array
     */
    function timezones(): array
    {
        return (array) timezone_identifiers_list();
    }
}
