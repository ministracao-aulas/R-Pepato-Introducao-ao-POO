<?php

namespace App;

use App\Contracts\HtmlClass;
use App\Concerns\HasStringableHtml;

class TabelaColuna implements HtmlClass, \Stringable
{
    use HasStringableHtml;

    protected ?string $content = null;

    public function __construct(
        ?string $content = null,
    ) {
        $this->content($content);
    }

    public static function make(?string $content = null): static
    {
        return new static($content);
    }

    public function content(?string $content = null): static
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content ?? '';
    }

    public function toHtml(): string
    {
        $content = $this->getContent();
        return implode(
            $content ? PHP_EOL : '',
            [
                static::getIndentationString($content ? 8 : 0) . '<td>',
                static::getIndentationString($content ? 8 : 0) . $content,
                static::getIndentationString($content ? 8 : 0) . '</td>'
            ]
        ) . PHP_EOL;
    }
}
