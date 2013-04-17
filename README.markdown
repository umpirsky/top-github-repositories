# Top GitHub Repositories [![Build Status](https://travis-ci.org/umpirsky/top-github-repositories.png?branch=master)](https://travis-ci.org/umpirsky/top-github-repositories)

Orders GitHub repositories by given parameter.

## Usage

```php
<?php

$repositories = (new Top\Github\Repositories\Fetcher(
    array(
        'Sylius'   => 'Sylius',
        'umpirsky' => 'country-list',
        'Symfony'  => 'Symfony',
    )
))->fetch();
```

This will return GitHub repositories ordered by number of watchers.
