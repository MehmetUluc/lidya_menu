<?php

namespace LidyaPos\Menu\Repositories\Interfaces;

use LidyaPos\Support\Repositories\Interfaces\RepositoryInterface;

interface MenuInterface extends RepositoryInterface
{

    /**
     * @param string $slug
     * @param bool $active
     * @param array $select
     * @param array $with
     * @return mixed
     */
    public function findBySlug($slug, $active, array $select = [], array $with = []);

    /**
     * @param string $name
     * @return mixed
     */
    public function createSlug($name);
}
