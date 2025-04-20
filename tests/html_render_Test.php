<?php

use PHPUnit\Framework\TestCase;

final class html_render_Test extends TestCase
{
    public function testScalar()
    {
        $this->assertEquals(html::render(''), '');
        $this->assertEquals(html::render('a'), 'a');
        $this->assertEquals(html::render('0'), '0');
        $this->assertEquals(html::render(0), '0');
        $this->assertEquals(html::render(42), '42');
        $this->assertEquals(html::render(42.42), '42.42');
        $this->assertEquals(html::render(true), '1');
        $this->assertEquals(html::render(false), '');
        $this->assertEquals(html::render(null), '');
    }

    public function testIndexedArray()
    {
        $this->assertEquals(html::render(['a']), 'a');
        $this->assertEquals(html::render(['a', 'b']), 'ab');
        $this->assertEquals(html::render([['a', 'b'], 'c']), 'abc');
    }

    public function testAssociativeArray()
    {
        $this->assertEquals(html::render(['test' => 'a']), '');
        $this->assertEquals(html::render(['tag' => 'a']), '');
        $this->assertEquals(html::render(['tag' => 'a'], true), '<a></a>');
        $this->assertEquals(html::render(['tag' => 'a', 'allow_empty_content' => true]), '<a></a>');
        $this->assertEquals(html::render(['tag' => 'input']), '<input>');
        $this->assertEquals(html::render(['tag' => 'input', 'type' => 'text']), '<input type="text">');
        $this->assertEquals(html::render(['tag' => 'input', 'type' => 'text', 'tabindex' => '0']), '<input type="text" tabindex="0">');
        $this->assertEquals(html::render(['tag' => 'a', 'content' => 'b']), '<a>b</a>');
        $this->assertEquals(html::render(['tag' => 'a', 'content' => '0']), '<a>0</a>');
        $this->assertEquals(html::render(['tag' => 'a', 'content' => ['b', 'c']]), '<a>bc</a>');
        $this->assertEquals(html::render(['tag' => 'a', 'content' => ['tag' => 'b', 'content' => 'c']]), '<a><b>c</b></a>');
    }
}
