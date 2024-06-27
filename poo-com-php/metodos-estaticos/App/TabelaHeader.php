<?php

namespace App;

use App\Contracts\HtmlClass;
use App\Concerns\HasStringableHtml;

class TabelaHeader implements HtmlClass, \Stringable
{
    use HasStringableHtml;

    protected array $rows = [];

    public function addRow(TabelaLinha $row): static
    {
        $this->rows[] = $row;

        return $this;
    }

    public function setRows(array $rows): static
    {
        $this->rows = array_filter($rows, fn($row) => is_a($row, TabelaLinha::class));

        return $this;
    }

    public function getRows(
        bool $toString = false,
        ?string $separator = null,
    ): string|array {
        $rows = array_filter(
            $this->rows ?? [],
            fn($row) => is_a($row, TabelaLinha::class)
        );

        return $toString ? implode(
            $separator ?? ''
            ,
            $rows
        ) : $rows;
    }

    public function toHtml(): string
    {
        return implode(
            PHP_EOL,
            [
                static::getIndentationString() . '<thead>',
                static::getIndentationString() . static::getIndentationString() . $this->getRows(true),
                static::getIndentationString() . '</thead>'
            ]
        );
        ;
    }
}
