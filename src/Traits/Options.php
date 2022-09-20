<?php

namespace Mitoop\Enum\Traits;

trait Options
{
    public static function options(): array
    {
        return array_map(static function ($case) {
            return array_merge([
                'name' => $case->name,
                'value' => $case->value,
            ], $case->getCustomOptions());
        }, static::cases());
    }

    public function getCustomOptions(): array
    {
        return [
            'label' => $this->label(),
        ];
    }
}
