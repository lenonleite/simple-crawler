<?php

namespace LenonLeite\Test\SimpleCrawler;


use Lenonleite\SimpleCrawler\General;
use PHPUnit\Framework\TestCase;

class GeneralTest extends TestCase
{
    /**
     * @var string
     */
    protected $simpleFileContent;

    /**
     * @var General
     */
    protected $general;

    protected function setUp()
    {
        parent::setUp();
        $this->simpleFileContent = file_get_contents(__DIR__ . '/Fixtures/simple.html');
        $this->general = new General();

    }

    public function testShouldReturnTags() {
        $tags = $this->general->get_tags('div', $this->simpleFileContent);
        $this->assertCount(3, $tags);
        $this->assertEquals('<div class="header">Header</div>', $tags[0]);
    }

    public function testShouldReturnAttributeTag() {
        $tags = $this->general->get_attribute_tag($this->simpleFileContent);
        $this->assertEquals('<html lang="en">', $tags['full']);
        $this->assertEquals('html', $tags['key']);
        $this->assertEquals('lang="en"', $tags['value']);
    }

    public function testShouldReturnManyAttributeTag()
    {
        $tags = $this->general->get_attributes_array_tags(['<div id="header" class="all">', '<div id="content">']);
        $this->assertCount(2, $tags);
        $this->assertEquals('<div id="header" class="all">', $tags[0]['full']);

    }

}