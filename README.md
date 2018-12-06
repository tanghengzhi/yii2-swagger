# Yii2 Swagger Extension

First of all, please make sure you have some basic concepts of Swagger OpenAPI and Swagger UI.

Then you can start with following steps:

# 1. Install `tanghengzhi/yii2-swagger` extension

```
composer require tanghengzhi/yii2-swagger --dev
```

# 2. Add following lines to `config/web.php`

```php
  //config/web.php
  
  $config = [
      ...
      'modules' => [
        'swagger' => [
            'class' => 'tanghengzhi\swagger\Module',
        ],
      ],
      ...
  ]
```

# 3. Add following lines to `config/params.php`
```php

    'swagger'=>[
        'scan_dir'=>[
            'app/controllers',
        ]
    ]

```
