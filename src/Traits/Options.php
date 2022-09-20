<?php

namespace Mitoop\Enums\Traits;

trait Options
{
    public static function options(): array
    {
        $cases = static::cases();

        $options = [];

        foreach ($cases as $case) {
            $item = [
                'name' => $case->name,
                'value' => $case->value,
            ];

            $options[] = method_exists($case, 'getCustomOptions') ? array_merge($item, $case->getCustomOptions()) : $item;
        }

        return $options;
    }

    public function getCustomOptions(): array
    {
        return [
            'label' => $this->label(),
        ];
    }
}
