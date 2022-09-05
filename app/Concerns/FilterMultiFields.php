<?php
namespace App\Concerns;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterMultiFields implements Filter 
{
    private $fields = [];

    function __construct(Array $fields)
    {
        $this->fields = $fields;
    }


    public function __invoke(Builder $query, $value, string $property)
    {
        
        $query->where(function (Builder $query) use ($value) {
            foreach ($this->fields as $field) {
                $query->orWhere($field,"LIKE", "%$value%");
            }
            
        });
    }
}
