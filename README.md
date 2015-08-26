# Laravel Questionable

## Installation

First, pull in the package through Composer.

```js
composer require tshafer/laravel-questionable:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    Tshafer\Questionable\ServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="Tshafer\Questionable\ServiceProvider" && php artisan migrate
```

-----

### Setup a Model
```php
<?php

namespace App;

use Tshafer\Questionable\Contracts\Questionable;
use Tshafer\Questionable\Traits\Questionable as QuestionableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Questionable
{
    use QuestionableTrait;
}
```

### Ask a question
```php
$post->createQuestion([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);
```

### Update a question
```php
$post->updateQuestion(1, [
    'title' => 'new title',
    'body' => 'new body',
]);
```

### Delete a question
```php
$post->deleteQuestion(1);
```

### Answer to a question
```php
$question->createAnswer([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);
```

### Update an answer
```php
$question->updateAnswer(1, [
    'title' => 'new title',
    'body' => 'new body',
]);
```

### Delete an answer
```php
$question->deleteAnswer(1);
```

### Mark an answer as solution
```php
$answer->markAsSolution();
```
