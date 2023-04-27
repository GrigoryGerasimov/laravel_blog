<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    protected $queryParams = [];

    public function __construct($queryParams)
    {
        $this->queryParams = $queryParams;
    }

    abstract public function getCallbacks(): array;

    public function apply(Builder $builder): void
    {
        foreach($this->getCallbacks() as $cbName => $cb) {
            if (isset($this->queryParams[$cbName])) {
                call_user_func($cb, $builder, $this->queryParams[$cbName]);
            }
        }
    }
}
