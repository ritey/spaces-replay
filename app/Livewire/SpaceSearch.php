<?php

namespace App\Livewire;

use App\Models\Space;
use Livewire\Component;
use Livewire\WithPagination;
use Ritey\LaravelManticore\FilterBuilder;

class SpaceSearch extends Component
{
    use WithPagination;

    public string $query = '';
    public string $state = '';
    public array $states = ['live', 'scheduled', 'ended'];

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function updatingState()
    {
        $this->resetPage();
    }

    public function render()
    {
        $filters = new FilterBuilder();

        if ('' !== $this->state) {
            $filters->where('state', $this->state);
        }

        $results = Space::search($this->query)
            ->tap(function ($builder) use ($filters) {
                $builder->filterBuilder = $filters;
                $builder->facets = ['state'];
                $builder->sort = [['title' => 'asc']];
            })
            ->paginate(10)
        ;

        return view('livewire.space-search', [
            'spaces' => $results,
        ]);
    }
}
