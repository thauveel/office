<?php

namespace App\Http\Livewire;

use App\Concerns\FilterMultiFields;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SearchDropdown extends Component
{
    public $search;
    public $name;
    public $model;
    public $placeholder;
    public $selected;
    public $selectfield;
    public $headerfield;
    public $displayfields=[];
    public $searchfields;

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >= 2) {
            
            $allowedfilters =[
                AllowedFilter::custom('query', new FilterMultiFields($this->searchfields))
            ];
            
            $searchResults = QueryBuilder::for($this->model,new Request(['filter' => ['query' => $this->search]]))
            ->defaultSort($this->selectfield)
            ->allowedFilters($allowedfilters)
            ->get();
        
        }
        // dump($searchResults);

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults),
        ]);
    }

    public function mount($name,$model,$placeholder,$displayfields,$searchfields,$value, $selectfield = 'id')
    {
        $this->name = $name;
        $this->model = $model;
        $this->placeholder = $placeholder;
        $this->selectfield = $selectfield;
        $this->displayfields = $displayfields;
        $this->searchfields = $searchfields;
        if($value) {
            $this->selected = $model::where($selectfield,$value)->first();
        }
    }

    public function selected($selection)
    {
        $this->selected = $selection;
    }

    public function clearselected()
    {
        $this->selected = null;
    }
}