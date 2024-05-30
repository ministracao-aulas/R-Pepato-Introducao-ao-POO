<?php

class Pessoa
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
