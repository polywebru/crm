<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasDatatableFilters
{
    public function filterInteger(string $column): array
    {
        return [
            $column,
            static function (Builder $query, $keyword) use ($column) {
                if (!is_numeric($keyword)) {
                    return $query;
                }

                return $query->where($column, $keyword);
            }
        ];
    }
}
