# Fw: Alert 是什么

[饭碗警告（Fw: Alert）](https://fwalert.com/115)可以轻松将 webhook（HTTP 请求）、邮件转发为短信、电话等报警，内置强大的模板变量提取功能，既可以轻松与任意监控系统组合使用，也可以快速接入自研监控系统。

## Fw: Alert PHP SDK

本 SDK 对 Fw: Alert 的 webhook 模式进行了封装，让你可以无需关注 HTTP 请求，只需几行代码即可快速在你的 PHP 项目中接入 `饭碗警告`。  
*\*如需在 Go 项目中使用，请移步：[https://github.com/YianAndCode/fwalert-php-sdk](https://github.com/YianAndCode/fwalert-go)*

在开始之前，请确保你已经注册好了[饭碗警告](https://fwalert.com/115)（点击左侧链接直达注册页）。

## 使用方式

通过 `composer` 安装：

```bash
composer require yian/fwalert-sdk
```

接下来只需要：

```php
<?php

use FwAlert\FwAlert;

$fw = new FwAlert;
$fw->SendAlert(
    '这里替换成在饭碗警告后台拿到的 webhook url',
    [
        'hello' => 'world',
    ]
);
```

## 进阶用法

本 SDK 除了封装 HTTP 请求外，还增加了“频道”的概念：当你设置了多个告警规则的时候，不需要在你的代码中实例化一堆 FwAlert 出来，只需要：

```php
<?php

use FwAlert\FwAlert;

$fw = new FwAlert;

// 提前注册好“频道”
$fw->AddChannel("ch1", "webhook_url1");
$fw->AddChannel("ch2", "webhook_url2");
// ...

$fw->Send(
    "ch1", // 后续只需要使用频道别名就可以发送到指定的告警规则了
    [
        'hello' => 'world',
    ]
);
```
