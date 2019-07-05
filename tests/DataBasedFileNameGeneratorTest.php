<?php

use PHPUnit\Framework\TestCase;

class DateBasedFileNameGeneratorTest extends TestCase
{
    private $default_ext = 'txt';
    private $csv_ext = 'csv';

    public function testGetTxt()
    {
        $filename = new DateBasedFileNameGenerator('Ymd_His');
        $this->assertEquals($this->default_ext, substr($filename->get(), -3));
    }

    public function testGetCsv()
    {
        $filename = new DateBasedFileNameGenerator('Ymd_His');
        $this->assertEquals($this->csv_ext, substr($filename->setExtension($this->csv_ext)->get(), -3));
    }
}