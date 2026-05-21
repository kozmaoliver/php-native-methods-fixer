<?php

declare(strict_types=1);

namespace NativeMethodsFixer\Tests;

use PHPUnit\Framework\TestCase;
use function NativeMethodsFixer\fixed_in_array;
use function NativeMethodsFixer\fixed_array_search;
use function NativeMethodsFixer\fixed_strpos;
use function NativeMethodsFixer\fixed_strrpos;
use function NativeMethodsFixer\fixed_strstr;
use function NativeMethodsFixer\fixed_stristr;
use function NativeMethodsFixer\fixed_strrchr;
use function NativeMethodsFixer\fixed_substr_count;
use function NativeMethodsFixer\fixed_str_contains;
use function NativeMethodsFixer\fixed_str_starts_with;
use function NativeMethodsFixer\fixed_str_ends_with;
use function NativeMethodsFixer\fixed_array_map;
use function NativeMethodsFixer\fixed_array_filter;
use function NativeMethodsFixer\fixed_array_reduce;
use function NativeMethodsFixer\fixed_array_walk;
use function NativeMethodsFixer\fixed_preg_match;
use function NativeMethodsFixer\fixed_preg_match_all;
use function NativeMethodsFixer\fixed_preg_replace;
use function NativeMethodsFixer\fixed_preg_filter;
use function NativeMethodsFixer\fixed_str_replace;
use function NativeMethodsFixer\fixed_str_ireplace;
use function NativeMethodsFixer\fixed_substr_replace;

class FunctionsTest extends TestCase
{
    public function testFixedInArray(): void
    {
        $haystack = ['apple', 'banana', 'orange'];
        $needle = 'banana';
        
        $this->assertTrue(fixed_in_array($haystack, $needle));
        $this->assertFalse(fixed_in_array($haystack, 'grape'));
        
        // Test strict mode
        $haystack = [1, 2, '3'];
        $this->assertTrue(fixed_in_array($haystack, '3', false));
        $this->assertTrue(fixed_in_array($haystack, '3', true));
        $this->assertTrue(fixed_in_array($haystack, 3, false));
        $this->assertFalse(fixed_in_array($haystack, 3, true));
    }

    public function testFixedArraySearch(): void
    {
        $haystack = ['a' => 'apple', 'b' => 'banana', 'c' => 'cherry'];
        
        $this->assertEquals('b', fixed_array_search($haystack, 'banana'));
        $this->assertFalse(fixed_array_search($haystack, 'grape'));
        
        // Test strict mode
        $haystack = [1, 2, '3'];
        $this->assertEquals(2, fixed_array_search($haystack, '3'));
        $this->assertEquals(2, fixed_array_search($haystack, 3, false));
        $this->assertFalse(fixed_array_search($haystack, 3, true));
    }

    public function testFixedStrpos(): void
    {
        $haystack = 'Hello, World!';
        
        $this->assertEquals(7, fixed_strpos($haystack, 'World'));
        $this->assertFalse(fixed_strpos($haystack, 'xyz'));
        $this->assertEquals(10, fixed_strpos($haystack, 'l', 5));
    }

    public function testFixedStrrpos(): void
    {
        $haystack = 'Hello, Hello!';
        
        $this->assertEquals(10, fixed_strrpos($haystack, 'l'));
        $this->assertEquals(3, fixed_strrpos($haystack, 'l', -5));
        $this->assertFalse(fixed_strrpos($haystack, 'xyz'));
    }

    public function testFixedStrstr(): void
    {
        $haystack = 'name@example.com';
        
        $this->assertEquals('@example.com', fixed_strstr($haystack, '@'));
        $this->assertEquals('name', fixed_strstr($haystack, '@', true));
        $this->assertFalse(fixed_strstr($haystack, 'xyz'));
    }

    public function testFixedStristr(): void
    {
        $haystack = 'Hello, World!';
        
        $this->assertEquals('World!', fixed_stristr($haystack, 'world'));
        $this->assertEquals('Hello, ', fixed_stristr($haystack, 'world', true));
        $this->assertFalse(fixed_stristr($haystack, 'xyz'));
    }

    public function testFixedStrrchr(): void
    {
        $haystack = 'path/to/file.txt';
        
        $this->assertEquals('/file.txt', fixed_strrchr($haystack, '/'));
        $this->assertEquals('.txt', fixed_strrchr($haystack, '.'));
        // strrchr finds last occurrence of ANY char in needle, so 'xyz' finds 'x' in '.txt'
        $this->assertEquals('xt', fixed_strrchr($haystack, 'xyz'));
        $this->assertFalse(fixed_strrchr($haystack, '!'));
    }

    public function testFixedSubstrCount(): void
    {
        $haystack = 'This is a test. This is only a test.';
        
        $this->assertEquals(2, fixed_substr_count($haystack, 'This'));
        // 'is' appears 4 times: in "This" (twice) and "is" (twice)
        $this->assertEquals(4, fixed_substr_count($haystack, 'is'));
        // Starting at offset 10 ("test. This is only a test."), 'is' appears 2 times
        $this->assertEquals(2, fixed_substr_count($haystack, 'is', 10));
        $this->assertEquals(0, fixed_substr_count($haystack, 'is', 10, 5));
    }

    public function testFixedStrContains(): void
    {
        $haystack = 'The quick brown fox';
        
        $this->assertTrue(fixed_str_contains($haystack, 'quick'));
        $this->assertFalse(fixed_str_contains($haystack, 'slow'));
        $this->assertTrue(fixed_str_contains($haystack, ''));
    }

    public function testFixedStrStartsWith(): void
    {
        $haystack = 'Hello, World!';
        
        $this->assertTrue(fixed_str_starts_with($haystack, 'Hello'));
        $this->assertFalse(fixed_str_starts_with($haystack, 'World'));
        $this->assertTrue(fixed_str_starts_with($haystack, ''));
    }

    public function testFixedStrEndsWith(): void
    {
        $haystack = 'Hello, World!';
        
        $this->assertTrue(fixed_str_ends_with($haystack, 'World!'));
        $this->assertFalse(fixed_str_ends_with($haystack, 'Hello'));
        $this->assertTrue(fixed_str_ends_with($haystack, ''));
    }

    public function testFixedArrayMap(): void
    {
        $array = [1, 2, 3, 4];
        $result = fixed_array_map($array, fn($n) => $n * 2);
        
        $this->assertEquals([2, 4, 6, 8], $result);
        
        // Test with multiple arrays
        $array2 = [10, 20, 30, 40];
        $result = fixed_array_map($array, fn($a, $b) => $a + $b, $array2);
        
        $this->assertEquals([11, 22, 33, 44], $result);
    }

    public function testFixedArrayFilter(): void
    {
        $array = [1, 2, 3, 4, 5, 6];
        $result = fixed_array_filter($array, fn($n) => $n % 2 === 0);
        
        $this->assertEquals([1 => 2, 3 => 4, 5 => 6], $result);
        
        // Test without callback (removes falsy values)
        $array = [0, 1, false, 2, '', 3, null, 4];
        $result = fixed_array_filter($array);
        
        $this->assertEquals([1 => 1, 3 => 2, 5 => 3, 7 => 4], $result);
    }

    public function testFixedArrayReduce(): void
    {
        $array = [1, 2, 3, 4];
        $result = fixed_array_reduce($array, fn($carry, $item) => $carry + $item, 0);
        
        $this->assertEquals(10, $result);
        
        // Test with string concatenation
        $array = ['a', 'b', 'c'];
        $result = fixed_array_reduce($array, fn($carry, $item) => $carry . $item, '');
        
        $this->assertEquals('abc', $result);
    }

    public function testFixedArrayWalk(): void
    {
        $array = [1, 2, 3];
        $result = [];
        
        fixed_array_walk($array, function($value, $key) use (&$result) {
            $result[$key] = $value * 2;
        });
        
        $this->assertEquals([2, 4, 6], $result);
        
        // Test modification by reference
        $array = ['a' => 1, 'b' => 2, 'c' => 3];
        fixed_array_walk($array, function(&$value) {
            $value *= 2;
        });
        
        $this->assertEquals(['a' => 2, 'b' => 4, 'c' => 6], $array);
    }

    public function testFixedPregMatch(): void
    {
        $subject = 'The year is 2024';
        $matches = [];
        
        $result = fixed_preg_match($subject, '/\d+/', $matches);
        
        $this->assertEquals(1, $result);
        $this->assertEquals(['2024'], $matches);
        
        // Test no match
        $result = fixed_preg_match($subject, '/xyz/', $matches);
        
        $this->assertEquals(0, $result);
    }

    public function testFixedPregMatchAll(): void
    {
        $subject = 'Phone: 123-456-7890, Fax: 098-765-4321';
        $matches = [];
        
        $result = fixed_preg_match_all($subject, '/\d{3}-\d{3}-\d{4}/', $matches);
        
        $this->assertEquals(2, $result);
        $this->assertEquals([['123-456-7890', '098-765-4321']], $matches);
    }

    public function testFixedPregReplace(): void
    {
        $subject = 'The year is 2024';
        $result = fixed_preg_replace($subject, '/\d+/', 'YEAR');
        
        $this->assertEquals('The year is YEAR', $result);
        
        // Test with array subjects
        $subjects = ['item1', 'item2', 'item3'];
        $result = fixed_preg_replace($subjects, '/item/', 'thing');
        
        $this->assertEquals(['thing1', 'thing2', 'thing3'], $result);
    }

    public function testFixedPregFilter(): void
    {
        $subjects = ['test123', 'no match', 'another456'];
        $result = fixed_preg_filter($subjects, '/\d+/', '[NUMBER]');
        
        $this->assertEquals([0 => 'test[NUMBER]', 2 => 'another[NUMBER]'], $result);
    }

    public function testFixedStrReplace(): void
    {
        $subject = 'Hello, World!';
        $result = fixed_str_replace($subject, 'World', 'PHP');
        
        $this->assertEquals('Hello, PHP!', $result);
        
        // Test with arrays
        $subject = 'The quick brown fox';
        $search = ['quick', 'brown'];
        $replace = ['slow', 'red'];
        $result = fixed_str_replace($subject, $search, $replace);
        
        $this->assertEquals('The slow red fox', $result);
        
        // Test with count
        $count = 0;
        $result = fixed_str_replace($subject, 'o', 'O', $count);
        
        $this->assertEquals('The quick brOwn fOx', $result);
        $this->assertEquals(2, $count);
    }

    public function testFixedStrIreplace(): void
    {
        $subject = 'Hello, World!';
        $result = fixed_str_ireplace($subject, 'world', 'PHP');
        
        $this->assertEquals('Hello, PHP!', $result);
        
        // Test case insensitivity
        $subject = 'PHP php PhP';
        $count = 0;
        $result = fixed_str_ireplace($subject, 'php', 'JavaScript', $count);
        
        $this->assertEquals('JavaScript JavaScript JavaScript', $result);
        $this->assertEquals(3, $count);
    }

    public function testFixedSubstrReplace(): void
    {
        $string = 'Hello, World!';
        $result = fixed_substr_replace($string, 'PHP', 7, 5);
        
        $this->assertEquals('Hello, PHP!', $result);
        
        // Test with array
        $strings = ['Hello', 'World'];
        $result = fixed_substr_replace($strings, '!', 5);
        
        $this->assertEquals(['Hello!', 'World!'], $result);
    }
}