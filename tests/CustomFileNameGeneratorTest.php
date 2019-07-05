<?php

use PHPUnit\Framework\TestCase;
use PlaceholderX\Exceptions\UnsupportedExtensionException;

class CustomFileNameGeneratorTest extends TestCase
{
    private $default_ext = 'txt';
    private $csv_ext = 'csv';
    private $length = 10;

    public function testGetTxt()
    {
        $filename = new CustomFileNameGenerator();
        $this->assertEquals($this->default_ext, substr($filename->get(), -3));
    }

    public function testGetCsv()
    {
        $filename = new CustomFileNameGenerator();
        $this->assertEquals($this->csv_ext, substr($filename->setExtension($this->csv_ext)->get(), -3));
    }

    public function testGetWithLength()
    {
        $filename = new CustomFileNameGenerator($this->length);
        $this->assertTrue(strlen($filename->get()) == $this->length + 4 ? true : false);

    }
}