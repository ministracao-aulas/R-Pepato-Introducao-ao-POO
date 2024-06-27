<?php

namespace App;

use App\Contracts\HtmlClass;
use App\Concerns\HasStringableHtml;

class TabelaLinha implements HtmlClass, \Stringable
{
    use HasStringableHtml;

    protected array $cols = [];

    public function __construct(array $cols = [])
    {
        $this->setCols($cols);
    }

    public static function make(array $cols = []): static
    {
        return new static($cols);
    }

    public function addCol(TabelaColuna $col): static
    {
        $this->cols[] = $col;

        return $this;
    }

    public function setCols(array $cols): static
    {
        $this->cols = array_filter($cols, fn($col) => is_a($col, TabelaColuna::class));

        return $this;
    }

    public function getCols(
        bool $toString = false,
        ?string $separator = null,
    ): string|array {
        $cols = array_filter(
            $this->cols ?? [],
            fn($col) => is_a($col, TabelaColuna::class)
        );

        return $toString ? implode(
            $separator ?? ''
            ,
            $cols
        ) : $cols;
    }

    public function toHtml(): string
    {
        $content = $this->getCols(true);
        return implode(
            '',
            [
                static::getIndentationString(0) . '<tr>',
                static::getIndentationString(0) . $content,
                static::getIndentationString(0) . '</tr>'
            ]
        ) . ($content ? PHP_EOL : '');
    }
}
