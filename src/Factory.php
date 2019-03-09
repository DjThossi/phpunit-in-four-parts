<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit;

use DjThossi\PHPUnit\Reader\CardReader;
use DjThossi\PHPUnit\Reader\DummyCardReader;

class Factory
{
    public function createApplication(): Application
    {
        return new Application($this->createCardReader());
    }

    private function createCardReader(): CardReader
    {
        return new DummyCardReader();
    }
}
