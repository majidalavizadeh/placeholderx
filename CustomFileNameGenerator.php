<?php

use PlaceholderX\Exceptions\UnsupportedExtensionException;
use PlaceholderX\FileNameGeneratorInterface;

/**
 * Class CustomFileNameGenerator
 */
class CustomFileNameGenerator implements FileNameGeneratorInterface
{

    /**  @var int */
    private $length;
    /** @var string */
    private $extension;
    /** @var array */
    private $supportedExtensions = [
        self::DEFAULT_EXTENSIONS,
        'csv',
        'sql',
        'xml'
    ];

    /**
     * CustomFileNameGenerator constructor.
     * @param int $length
     */
    public function __construct($length = 5)
    {
        $this->length = $length;
        $this->extension = self::DEFAULT_EXTENSIONS;
    }


    /**
     * @return string
     */
    private function randomName()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < $this->length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->randomName();
    }

    /**
     * @param string $extension
     * @return FileNameGeneratorInterface
     * @throws UnsupportedExtensionException
     */
    public function setExtension(string $extension): FileNameGeneratorInterface
    {
        if (in_array($extension, $this->supportedExtensions)) {
            $this->extension = $extension;
        } else {
            throw new UnsupportedExtensionException(strtoupper($extension) . " not supported.", 100);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->getName() . '.' . $this->extension;
    }

}