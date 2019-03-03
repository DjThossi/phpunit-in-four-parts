<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit;

use DjThossi\PHPUnit\Reader\CardReader;
use DjThossi\PHPUnit\Reader\ColorReader;
use DjThossi\PHPUnit\Reader\DummyCardReader;
use DjThossi\PHPUnit\Reader\DummyColorReader;
use DjThossi\PHPUnit\Reader\DummyOptionReader;
use DjThossi\PHPUnit\Reader\OptionReader;

class Factory
{
    public function createCardReader(): CardReader
    {
        return new DummyCardReader(
            $this->createColorReader(),
            $this->createOptionsReader()
        );
    }

    private function createColorReader(): ColorReader
    {
        return new DummyColorReader();
    }

    private function createOptionsReader(): OptionReader
    {
        return new DummyOptionReader();
    }
}
