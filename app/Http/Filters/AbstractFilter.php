<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    public function __construct(private array $queryParams)
    {}

    abstract protected function getCallback(): array;

    public function apply(Builder $builder): void
    {
        $this->before($builder);

        foreach ($this->getCallback() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    protected function before(Builder $builder) : void
    {

    }

}
