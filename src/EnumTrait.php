<?php

namespace Mitoop\Enum;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;
use Mitoop\Enum\Traits\Options;

trait EnumTrait
{
    use InvokableCases;
    use Names;
    use Values;
    use Options;
    use Metadata {
        __call as metadataCall;
    }

    protected function dynamicIs($method): bool
    {
        /** @var \BackedEnum $this */
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
