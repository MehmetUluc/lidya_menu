<?php

namespace LidyaPos\Menu\Repositories\Caches;

use LidyaPos\Menu\Repositories\Interfaces\MenuInterface;
use LidyaPos\Support\Repositories\Caches\CacheAbstractDecorator;

class MenuCacheDecorator extends CacheAbstractDecorator implements MenuInterface
{

    /**
     * {@inheritDoc}
     */
    public function findBySlug($slug, $active, array $select = [], array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function createSlug($name)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }
}
