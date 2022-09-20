# Enum

## 说明
Enum的简单封装


## 安装
```shell
$ composer require mitoop/enum
```

## 使用

```php
// UserStatus.php
<?php

namespace App\Enums;

use App\Enums\Properties\Color;
use ArchTech\Enums\Meta\Meta;
use Mitoop\Enum\Contracts\EnumOptionInterface;
use Mitoop\Enum\EnumTrait;
use Mitoop\Enum\Properties\Label;

/**
 * @method string label()
 * @method string color()
 * @method string isOn()
 * @method string isOff()
 */
#[Meta(Label::class, Color::class)]
enum UserStatus: int implements EnumOptionInterface
{
    use EnumTrait;

    #[Label('在职')] #[Color('green')]
    case ON = 1;

    #[Label('离职')] #[Color('red')]
    case OFF = 2;
}
// UserStatus.php end

// Color.php
<?php

namespace App\Enums\Properties;

use ArchTech\Enums\Meta\MetaProperty;
use Attribute;use http\Client\Curl\User;

#[Attribute]
class Color extends MetaProperty
{
    public static function method(): string
    {
        return 'color';
    }
}
// Color.php end

// Laravel 模型中使用
protected $casts = [
    'status' => UserStatus::class,
];

User::find(1)->status->isOn();

// 其他方法
UserStatus::ON->name;
UserStatus::ON->value;
UserStatus::ON->label();
UserStatus::ON->color();
UserStatus::ON->isOn();
UserStatus::ON->isOff();
UserStatus::options();
```
