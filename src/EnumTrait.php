<?php

namespace Mitoop\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;
use Mitoop\Enums\Traits\Options;

trait EnumTrait
{
    use InvokableCases;
    use Names;
    use Values;
    use Options;
    use Metadata {
        __call as metadataCall;
    }

    public function dynamicIs($method): bool
    {
        return $this->name === strtoupper(substr($method, 2));
    }

    public function __call(string $method, $arguments): mixed
    {
        if (str_starts_with($method, 'is')) {
            return $this->dynamicIs($method);
        }

        return $this->metadataCall($method, $arguments);
    }
}