<?php

namespace App\Livewire;

use App\Models\Patients as ModelsPatients;
use Livewire\Component;

class Patients extends Component
{
    public  $search;

    public function mount(string $search = null)
    {
        if ($search) {
            $this->search = $search;
        }
    }
    public function render()
    {
        $patients = ModelsPatients::with(['category'])->has('insurance');
        if ($this->search) {
            $patients = $patients->where(function ($query) {
                $query->where('name', 'like', "%{$this->search}%", "or")->where('card_number', 'like', "{$this->search}%", "or");
            });
        }
        return view('livewire.patients', [
            'patients' => $patients->paginate(20)->withQueryString(),
        ]);
    }
}
