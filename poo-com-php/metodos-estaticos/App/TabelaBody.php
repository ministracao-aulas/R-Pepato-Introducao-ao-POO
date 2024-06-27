<?php

namespace App;

use App\Contracts\HtmlClass;
use App\Concerns\HasStringableHtml;

class TabelaBody implements HtmlClass, \Stringable
{
    use HasStringableHtml;

    public function toHtml(): string
    {
        return '<table></table>';
    }
}
