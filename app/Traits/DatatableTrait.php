<?php

namespace App\Traits;

use Yajra\DataTables\EloquentDataTable;

trait DatatableTrait
{
    protected function filterDatatable(
        EloquentDataTable &$datatables,
        array $params,
        callable $callback = null
    ) {
        return $datatables->filter(function ($query) use ($params, $callback) {
            if ($this->hasAttr($params, 'keywords')) {
                $query->byKeywords($params['keywords']);
            }
            if (is_callable($callback)) {
                call_user_func_array($callback, [$query, $params]);
            }
        });
    }

    protected function columnDatatable(EloquentDataTable $datatables, $model)
    {
        return $datatables->addColumn('actions', function ($item) use ($model) {
            $actions['edit'] = [
                'uri' => route(sprintf('%s%s.edit', $this->prefix, strtolower(class_basename($model))), $item->id),
                'label' => __('repositories.title.edit'),
            ];
            $actions['delete'] = [
                'uri' => route(sprintf('%s%s.destroy', $this->prefix, strtolower(class_basename($model))), $item->id),
                'label' => __('repositories.title.delete'),
            ];

            return $actions;
        });
    }

    protected function hasAttr($params, $attr)
    {
        return array_has($params, $attr) && !empty($params[$attr]);
    }
}
