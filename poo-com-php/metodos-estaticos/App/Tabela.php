<?php

namespace App;

use App\Contracts\HtmlClass;
use App\TabelaHeader;
use App\Concerns\HasStringableHtml;

class Tabela implements HtmlClass, \Stringable
{
    use HasStringableHtml;

    protected ?TabelaHeader $header = null;

    public function header(?TabelaHeader $header): static
    {
        $this->header = $header;

        return $this;
    }

    public function getHeader(): ?TabelaHeader
    {
        return $this->header;
    }


    public function toHtml(): string
    {
        return implode(PHP_EOL,
        [
            '<table>',
            $this->getHeader(),
            '</table>'
        ]);
    }
}
