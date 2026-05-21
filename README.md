# Native Methods Fixer

> Just for fun, I don't want to offend anyone. Enjoy!

A whimsical PHP package that fixes the inconsistent parameter ordering in PHP's native functions by providing wrapper functions with consistent signatures.

## The Problem

PHP's native functions have inconsistent parameter ordering:

```php
// Needle/haystack are swapped between array and string functions
in_array($needle, $haystack)
strpos($haystack, $needle)

// Callback position varies
array_map($callback, $array)
array_filter($array, $callback)

// Subject position in replacement functions
preg_replace($pattern, $replacement, $subject)
str_replace($search, $replace, $subject)
```

## The Solution

This package provides `fixed_*` wrapper functions that consistently place the subject/haystack as the first parameter:

```php
use function NativeMethodsFixer\fixed_in_array;
use function NativeMethodsFixer\fixed_strpos;
use function NativeMethodsFixer\fixed_array_map;
use function NativeMethodsFixer\fixed_preg_replace;

// All search functions: haystack first, needle second
fixed_in_array($haystack, $needle)
fixed_strpos($haystack, $needle)

// All array functions: array first, callback second
fixed_array_map($array, $callback)
fixed_array_filter($array, $callback)

// All replacement functions: subject first
fixed_preg_replace($subject, $pattern, $replacement)
fixed_str_replace($subject, $search, $replace)
```

## Installation

```bash
composer require kozmaoliver/native-methods-fixer
```

## Usage

The functions are automatically available after Composer autoload:

```php
<?php
require 'vendor/autoload.php';

use function NativeMethodsFixer\fixed_in_array;
use function NativeMethodsFixer\fixed_strpos;

$fruits = ['apple', 'banana', 'orange'];
if (fixed_in_array($fruits, 'banana')) {
    echo "Found banana!";
}

$text = 'Hello, World!';
$pos = fixed_strpos($text, 'World');
```

## Available Functions

### Search Functions (haystack, needle)
- `fixed_in_array()` - Search for value in array
- `fixed_array_search()` - Search for value and return key
- `fixed_strpos()` - Find position of substring
- `fixed_strrpos()` - Find last position of substring
- `fixed_strstr()` - Find first occurrence of string
- `fixed_stristr()` - Case-insensitive strstr
- `fixed_strrchr()` - Find last occurrence of character
- `fixed_substr_count()` - Count substring occurrences
- `fixed_str_contains()` - Check if string contains substring
- `fixed_str_starts_with()` - Check if string starts with substring
- `fixed_str_ends_with()` - Check if string ends with substring

### Array Functions (array, callback)
- `fixed_array_map()` - Apply callback to array elements
- `fixed_array_filter()` - Filter array with callback
- `fixed_array_reduce()` - Reduce array to single value
- `fixed_array_walk()` - Apply function to every element

### Regex/Replace Functions (subject, pattern/search, ...)
- `fixed_preg_match()` - Perform regex match
- `fixed_preg_match_all()` - Perform global regex match
- `fixed_preg_replace()` - Perform regex search and replace
- `fixed_preg_filter()` - Perform regex replace and filter
- `fixed_str_replace()` - Replace all occurrences
- `fixed_str_ireplace()` - Case-insensitive replace
- `fixed_substr_replace()` - Replace part of string

## Requirements

- PHP 8.2 or higher

## License

MIT
