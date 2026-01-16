<?php

declare(strict_types=1);

namespace LaminasTest\Log\TestAsset;

use Laminas\Log\Writer\AbstractWriter;

use function fopen;
use function uniqid;

class ErrorGeneratingWriter extends AbstractWriter
{
    protected function doWrite(array $event)
    {
        // Trigger E_WARNING by opening a non-existent file
        fopen('/nonexistent/path/that/does/not/exist/' . uniqid(), 'r');
    }
}
