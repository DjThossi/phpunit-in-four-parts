<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Domain\Option;

class DummyOptionReader implements OptionReader
{
    public function getOptions(): OptionCollection
    {
        $options = new OptionCollection();
        $options->addOption(new Option('D01'));
        $options->addOption(new Option('V05'));

        return $options;
    }
}
