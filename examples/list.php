<?php

require __DIR__.'/../vendor/autoload.php';

$list = (new Top\Github\Repositories\Fetcher(
    array(
        'Sylius'   => 'Sylius',
        'umpirsky' => 'country-list',
        'Symfony'  => 'Symfony',
    ),
    new Github\Client(
        new Github\HttpClient\CachedHttpClient(array('cache_dir' => '/tmp/github-api-cache'))
    )
))->fetch();

foreach ($list as $index => $repository) {
    printf('%d. %s (%d)%s', $index + 1, $repository['name'], $repository['watchers_count'], PHP_EOL);
}
