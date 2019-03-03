<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Collection\OptionCollection;

interface OptionReader
{
    public function getOptions(): OptionCollection;
}
