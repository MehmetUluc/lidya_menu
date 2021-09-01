<?php

namespace LidyaPos\Menu\Repositories\Eloquent;

use LidyaPos\Menu\Repositories\Interfaces\MenuNodeInterface;
use LidyaPos\Support\Repositories\Eloquent\RepositoriesAbstract;

class MenuNodeRepository extends RepositoriesAbstract implements MenuNodeInterface
{
    /**
     * {@inheritDoc}
     */
    public function getByMenuId($menuId, $parentId, $select = ['*'], array $with = ['child'])
    {
        $data = $this->model
            ->with($with)
            ->where([
                'menu_id'   => $menuId,
                'parent_id' => $parentId,
            ]);

        if (!empty($select)) {
            $data = $data->select($select);
        }

        $data = $data->orderBy('position', 'asc')
            ->get();

        $this->resetModel();

        return $data;
    }
}