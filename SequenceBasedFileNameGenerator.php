<?php

use PlaceholderX\Exceptions\UnsupportedExtensionException;
use PlaceholderX\FileNameGeneratorInterface;

/**
 * Class SequenceBasedFileNameGenerator
 */
class SequenceBasedFileNameGenerator implements FileNameGeneratorInterface
{

    /** @var string */
    private $extension;
    /** @var int */
    private $sequence;
    /** @var array */
    private $supportedExtensions = [
        self::DEFAULT_EXTENSIONS,
        'csv',
        'sql',
        'xml'
    ];

    /**
     * SequenceBasedFileNameGenerator constructor.
     * @param int $startFrom
     */
    public function __construct($startFrom = 1)
    {
        $this->sequence = $startFrom;
        $this->extension = self::DEFAULT_EXTENSIONS;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        $filename = $this->sequence;
        $this->sequence++;
        return $filename;
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