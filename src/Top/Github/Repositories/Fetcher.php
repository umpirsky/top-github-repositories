<?php

namespace Top\Github\Repositories;

use Github\Client as Github;

class Fetcher
{
    protected $repositories;
    protected $github;

    public function __construct(array $repositories, Github $github = null)
    {
        if (null === $github) {
            $github = new Github();
        }

        $this->repositories = $repositories;
        $this->github = $github;
    }

    public function fetch($orderBy = 'watchers_count')
    {
        $repositories = [];
        foreach ($this->repositories as $username => $repository) {
            $repositories[] = $this->github->api('repo')->show($username, $repository);
        }

        usort($repositories, function($r1, $r2) use ($orderBy) {
            return $r1[$orderBy] < $r2[$orderBy];
        });

        return $repositories;
    }
}
