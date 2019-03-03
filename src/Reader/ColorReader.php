<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Collection\ColorCollection;

interface ColorReader
{
    public function getColors(): ColorCollection;
}
