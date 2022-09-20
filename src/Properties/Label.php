<?php

namespace Mitoop\Enums\Properties;

use ArchTech\Enums\Meta\MetaProperty;
use Attribute;

#[Attribute]
class Label extends MetaProperty
{
    public static function method(): string
    {
        return 'label';
    }
}
