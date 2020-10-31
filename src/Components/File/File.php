<?php

namespace App\Components\File;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class File
{
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function toArray()
    {
        return [
            "name" => $this->getName(),
            "size" => $this->getSize(),
            "extension" => $this->getExtension()
        ];
    }

    public function getName(): string
    {
        return $this->getPathInfo(PATHINFO_FILENAME);
    }

    public function getExtension(): string
    {
        return $this->getPathInfo(PATHINFO_EXTENSION);
    }

    public function getSize(): int
    {
        return filesize($this->filename);
    }

    private function getPathInfo($for): string
    {
        //var_dump(pathinfo($this->filename));
        return pathinfo($this->filename, $for);
    }

    public function getLink()
    {
        return "web/".$this->getName().".".$this->getExtension();
    }
}
