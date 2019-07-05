<?php

use PHPUnit\Framework\TestCase;
use PlaceholderX\Exceptions\UnsupportedExtensionException;

class SequenceBasedFileNameGeneratorTest extends TestCase
{
    private $first_file = '1.txt';
    private $second_file = '2.csv';
    private $start_seq = 5;
    private $invalid_ext = 'foobar';

    public function testWithoutStartFrom()
    {
        $filename = new SequenceBasedFileNameGenerator();
        $this->assertEquals($this->first_file, $filename->get());
        $this->assertEquals($this->second_file, $filename->setExtension('csv')->get());
    }

    public function testWithStartFrom()
    {
        $filename = new SequenceBasedFileNameGenerator($this->start_seq);
        $this->assertEquals($this->start_seq . '.txt', $filename->get());
    }

    public function testException()
    {
        try {
            $filename = new SequenceBasedFileNameGenerator();
            $filename->setExtension($this->invalid_ext)->get();
            $this->assertTrue(FALSE);
        } catch (UnsupportedExtensionException $e) {
            $this->assertTrue(TRUE);
        }
    }
}