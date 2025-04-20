<?php

use PHPUnit\Framework\TestCase;

final class html_tag_Test extends TestCase
{
    public function testTag()
    {
        $this->assertEquals(html::tag('div', [], 'Hello World'), '<div>Hello World</div>');
        $this->assertEquals(html::tag('div', [], ''), '');
        $this->assertEquals(html::tag('div', [], '', true), '<div></div>');
        $this->assertEquals(html::tag('FOO', [], '', true), '<FOO></FOO>');
        $this->assertEquals(html::tag('foo-bar', [], '', true), '<foo-bar></foo-bar>');
        $this->assertEquals(html::tag('Foo-Bar', [], '', true), '<Foo-Bar></Foo-Bar>');
        $this->assertEquals(html::tag(' foo ', [], '', true), '<foo></foo>');
    }

    public function testEmptyTag()
    {
        $this->assertEquals(html::tag(''), '');
        $this->assertEquals(html::tag('', [], ''), '');
        $this->assertEquals(html::tag('', [], '', true), '');
    }
    public function testSingletonTag()
    {
        $this->assertEquals(html::tag('br'), '<br>');
        $this->assertEquals(html::tag('input', [], 'foo'), '<input>');
        $this->assertEquals(html::tag('link', [], 'foo', true), '<link>');
    }

    public function testAttributes()
    {
        $this->assertEquals(html::tag('input', ['type' => 'text']), '<input type="text">');
        $this->assertEquals(html::tag('div', ['id' => 'foo'], 'bar'), '<div id="foo">bar</div>');
        $this->assertEquals(html::tag('div', ['id' => 'foo']), '');
        $this->assertEquals(html::tag('div', ['id' => 'foo'], '', true), '<div id="foo"></div>');
        $this->assertEquals(html::tag('input', ['required' => ''], ''), '<input required>');
        $this->assertEquals(html::tag('input', ['required' => 0], ''), '<input required>');
        $this->assertEquals(html::tag('input', ['required' => false], ''), '<input required>');
        $this->assertEquals(html::tag('input', ['value' => "0"], ''), '<input value="0">');
    }

    public function testAllowEmptyContent()
    {
        $this->assertEquals(html::tag('div', [], '', true), '<div></div>');
        $this->assertEquals(html::tag('div', [], '', false), '');
        $this->assertEquals(html::tag('div', [], ''), '');
    }
}
