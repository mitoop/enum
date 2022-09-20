<?php

namespace Mitoop\Enum\Traits;

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

    protected function getCustomOptions(): array
    {
        return [
            'label' => $this->label(),
        ];
    }
}
