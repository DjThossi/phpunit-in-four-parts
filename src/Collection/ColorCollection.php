<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Collection;

use DjThossi\PHPUnit\Domain\Color;

class ColorCollection extends BaseCollection
{
    public function addColor(Color $color): void
    {
        $this->addElement($color);
    }

    public function current(): Color
    {
        return $this->getCurrent();
    }
}
