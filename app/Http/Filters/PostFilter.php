<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const AUTHOR = 'author';
    public const CATEGORY_ID = 'category_id';

    public function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::AUTHOR => [$this, 'author'],
            self::CATEGORY_ID => [$this, 'category_id']
        ];
    }

    public function title(Builder $builder, $value): Builder
    {
        return $builder->where('title', 'like', "%$value%");
    }

    public function author(Builder $builder, $value): Builder
    {
        return $builder->where('author', 'like', "%$value%");
    }

    public function category_id(Builder $builder, $value): Builder
    {
        return $builder->where('category_id', '=', "$value");
    }
}
