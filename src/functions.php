<?php

declare(strict_types=1);

namespace NativeMethodsFixer;

/**
 * Search for a value in an array (haystack first).
 * 
 * @param array $haystack The array to search in
 * @param mixed $needle The value to search for
 * @param bool $strict Whether to use strict comparison
 * @return bool True if needle is found in the array
 */
function fixed_in_array(array $haystack, mixed $needle, bool $strict = false): bool
{
    return in_array($needle, $haystack, $strict);
}

/**
 * Search for a value in an array and return its key (haystack first).
 * 
 * @param array $haystack The array to search in
 * @param mixed $needle The value to search for
 * @param bool $strict Whether to use strict comparison
 * @return int|string|false The key if found, false otherwise
 */
function fixed_array_search(array $haystack, mixed $needle, bool $strict = false): int|string|false
{
    return array_search($needle, $haystack, $strict);
}

/**
 * Find the position of the first occurrence of a substring (already haystack first).
 * 
 * @param string $haystack The string to search in
 * @param string $needle The string to search for
 * @param int $offset Starting position for the search
 * @return int|false The position or false if not found
 */
function fixed_strpos(string $haystack, string $needle, int $offset = 0): int|false
{
    return strpos($haystack, $needle, $offset);
}

/**
 * Find the position of the last occurrence of a substring (already haystack first).
 * 
 * @param string $haystack The string to search in
 * @param string $needle The string to search for
 * @param int $offset Starting position for the search
 * @return int|false The position or false if not found
 */
function fixed_strrpos(string $haystack, string $needle, int $offset = 0): int|false
{
    return strrpos($haystack, $needle, $offset);
}

/**
 * Find first occurrence of a string (already haystack first).
 * 
 * @param string $haystack The string to search in
 * @param string $needle The string to search for
 * @param bool $before_needle Return part of haystack before needle
 * @return string|false The matched string or false if not found
 */
function fixed_strstr(string $haystack, string $needle, bool $before_needle = false): string|false
{
    return strstr($haystack, $needle, $before_needle);
}

/**
 * Case-insensitive strstr (already haystack first).
 * 
 * @param string $haystack The string to search in
 * @param string $needle The string to search for
 * @param bool $before_needle Return part of haystack before needle
 * @return string|false The matched string or false if not found
 */
function fixed_stristr(string $haystack, string $needle, bool $before_needle = false): string|false
{
    return stristr($haystack, $needle, $before_needle);
}

/**
 * Find the last occurrence of a character (already haystack first).
 * 
 * @param string $haystack The string to search in
 * @param string $needle The character to search for
 * @return string|false The substring starting from needle or false
 */
function fixed_strrchr(string $haystack, string $needle): string|false
{
    return strrchr($haystack, $needle);
}

/**
 * Count substring occurrences (already haystack first).
 * 
 * @param string $haystack The string to search in
 * @param string $needle The substring to count
 * @param int $offset Starting position
 * @param int|null $length Maximum length to search
 * @return int The number of occurrences
 */
function fixed_substr_count(string $haystack, string $needle, int $offset = 0, ?int $length = null): int
{
    return substr_count($haystack, $needle, $offset, $length);
}

/**
 * Determine if a string contains a given substring (already haystack first).
 * 
 * @param string $haystack The string to search in
 * @param string $needle The substring to search for
 * @return bool True if needle is found in haystack
 */
function fixed_str_contains(string $haystack, string $needle): bool
{
    return str_contains($haystack, $needle);
}

/**
 * Checks if a string starts with a given substring (already haystack first).
 * 
 * @param string $haystack The string to check
 * @param string $needle The prefix to look for
 * @return bool True if haystack starts with needle
 */
function fixed_str_starts_with(string $haystack, string $needle): bool
{
    return str_starts_with($haystack, $needle);
}

/**
 * Checks if a string ends with a given substring (already haystack first).
 * 
 * @param string $haystack The string to check
 * @param string $needle The suffix to look for
 * @return bool True if haystack ends with needle
 */
function fixed_str_ends_with(string $haystack, string $needle): bool
{
    return str_ends_with($haystack, $needle);
}

/**
 * Apply a callback to elements of arrays (array first).
 * 
 * @param array $array The array to iterate over
 * @param callable $callback The callback to apply
 * @param array ...$arrays Additional arrays for multi-array mapping
 * @return array The array with callback applied
 */
function fixed_array_map(array $array, callable $callback, array ...$arrays): array
{
    return array_map($callback, $array, ...$arrays);
}

/**
 * Filter array elements with a callback (already array first).
 * 
 * @param array $array The array to filter
 * @param callable|null $callback The callback function
 * @param int $mode Flag to pass keys, values, or both
 * @return array The filtered array
 */
function fixed_array_filter(array $array, ?callable $callback = null, int $mode = 0): array
{
    return array_filter($array, $callback, $mode);
}

/**
 * Iteratively reduce array to single value (already array first).
 * 
 * @param array $array The array to reduce
 * @param callable $callback The reduction callback
 * @param mixed $initial Initial value
 * @return mixed The final reduced value
 */
function fixed_array_reduce(array $array, callable $callback, mixed $initial = null): mixed
{
    return array_reduce($array, $callback, $initial);
}

/**
 * Apply user function to array elements (already array first).
 * 
 * @param array &$array The array to walk through
 * @param callable $callback The callback to apply
 * @param mixed $arg Optional user data
 * @return bool True on success
 */
function fixed_array_walk(array &$array, callable $callback, mixed $arg = null): bool
{
    return array_walk($array, $callback, $arg);
}

/**
 * Perform regex match (subject first).
 * 
 * @param string $subject The string to match against
 * @param string $pattern The pattern to match
 * @param array &$matches Variable to store matches
 * @param int $flags Match flags
 * @param int $offset Starting offset
 * @return int|false 1 if match, 0 if no match, false on error
 */
function fixed_preg_match(string $subject, string $pattern, array &$matches = null, int $flags = 0, int $offset = 0): int|false
{
    return preg_match($pattern, $subject, $matches, $flags, $offset);
}

/**
 * Perform global regex match (subject first).
 * 
 * @param string $subject The string to match against
 * @param string $pattern The pattern to match
 * @param array &$matches Variable to store matches
 * @param int $flags Match flags
 * @param int $offset Starting offset
 * @return int|false Number of matches or false on error
 */
function fixed_preg_match_all(string $subject, string $pattern, array &$matches = null, int $flags = 0, int $offset = 0): int|false
{
    return preg_match_all($pattern, $subject, $matches, $flags, $offset);
}

/**
 * Perform regex search and replace (subject first).
 * 
 * @param string|array $subject The string(s) to search and replace
 * @param string|array $pattern The pattern(s) to search for
 * @param string|array $replacement The replacement(s)
 * @param int $limit Maximum replacements
 * @param int &$count Variable to store replacement count
 * @return string|array|null The modified string(s) or null on error
 */
function fixed_preg_replace(string|array $subject, string|array $pattern, string|array $replacement, int $limit = -1, int &$count = null): string|array|null
{
    return preg_replace($pattern, $replacement, $subject, $limit, $count);
}

/**
 * Perform regex replace and filter (subject first).
 * 
 * @param string|array $subject The string(s) to search and replace
 * @param string|array $pattern The pattern(s) to search for
 * @param string|array $replacement The replacement(s)
 * @param int $limit Maximum replacements
 * @param int &$count Variable to store replacement count
 * @return string|array|null The modified string(s) that had replacements
 */
function fixed_preg_filter(string|array $subject, string|array $pattern, string|array $replacement, int $limit = -1, int &$count = null): string|array|null
{
    return preg_filter($pattern, $replacement, $subject, $limit, $count);
}

/**
 * Replace all occurrences of search string (subject first).
 * 
 * @param string|array $subject The string(s) to search in
 * @param string|array $search The value(s) to search for
 * @param string|array $replace The replacement value(s)
 * @param int &$count Variable to store replacement count
 * @return string|array The modified string(s)
 */
function fixed_str_replace(string|array $subject, string|array $search, string|array $replace, int &$count = null): string|array
{
    return str_replace($search, $replace, $subject, $count);
}

/**
 * Case-insensitive str_replace (subject first).
 * 
 * @param string|array $subject The string(s) to search in
 * @param string|array $search The value(s) to search for
 * @param string|array $replace The replacement value(s)
 * @param int &$count Variable to store replacement count
 * @return string|array The modified string(s)
 */
function fixed_str_ireplace(string|array $subject, string|array $search, string|array $replace, int &$count = null): string|array
{
    return str_ireplace($search, $replace, $subject, $count);
}

/**
 * Replace part of a string (already subject first).
 * 
 * @param string|array $string The input string(s)
 * @param string|array $replacement The replacement string(s)
 * @param int|array $offset Starting position
 * @param int|array|null $length Length to replace
 * @return string|array The modified string(s)
 */
function fixed_substr_replace(string|array $string, string|array $replacement, int|array $offset, int|array|null $length = null): string|array
{
    return substr_replace($string, $replacement, $offset, $length);
}