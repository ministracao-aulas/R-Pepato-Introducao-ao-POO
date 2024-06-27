<?php

namespace App\Concerns;

trait HasStringableHtml
{
    public function __tostring(): string
    {
        return $this->toHtml();
    }

    public function getIndentationString(int $spaces = 4): string
    {
        return str_repeat(' ', $spaces);;
    }
}
