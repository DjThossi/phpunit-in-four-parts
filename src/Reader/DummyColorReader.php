<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Domain\Color;

class DummyColorReader implements ColorReader
{
    public function getColors(): ColorCollection
    {
        $colors = new ColorCollection();
        $colors->addColor(new Color('C05'));

        return $colors;
    }
}
