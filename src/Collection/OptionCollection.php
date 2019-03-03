<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Collection;

use DjThossi\PHPUnit\Domain\Option;

class OptionCollection extends BaseCollection
{
    public function addOption(Option $option): void
    {
        $this->addElement($option);
    }

    public function current(): Option
    {
        return $this->getCurrent();
    }
}
