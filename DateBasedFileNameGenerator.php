<?php

use PlaceholderX\Exceptions\UnsupportedExtensionException;
use PlaceholderX\FileNameGeneratorInterface;

/**
 * Class DateBasedFileNameGenerator
 */
class DateBasedFileNameGenerator implements FileNameGeneratorInterface
{

    /** @var string */
    private $format;
    /** @var string */
    private $extension;
    /** @var array */
    private $supportedExtensions = [
        self::DEFAULT_EXTENSIONS,
        'csv',
        'sql',
        'xml',
    ];

    /**
     * DateBasedFileNameGenerator constructor.
     * @param $format
     */
    public function __construct($format)
    {
        $this->format = $format;
        $this->extension = self::DEFAULT_EXTENSIONS;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return date($this->format);
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