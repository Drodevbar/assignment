<?php

namespace App\Dto;

class Repository
{
    /**
     * @var [] string => mixed
     */
    private $properties = [];

    /**
     * @param string $key
     * @param mixed $value
     */
    public function setProperty(string $key, $value): void
    {
        $this->properties[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->properties[$key];
    }

    public function getAll(): array
    {
        return $this->properties;
    }

    public function merge(Repository $otherRepository): void
    {
        foreach ($otherRepository->getAll() as $key => $property) {
            $this->properties[$key] = $property;
        }
    }

    public function isEmpty(): bool
    {
        return empty($this->properties);
    }
}
