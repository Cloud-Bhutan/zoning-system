<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\HouseholdDetail;


class SearchHouseholdDetails extends Component
{


    use WithPagination;

   // public $mobile_no;

    //public $householdDetails;


    
    public function render()
    {

        //$mobile_no = '%'.$this->mobile_no . '%';

        return view('livewire.search-household-details', [
            'householdDetails' => HouseholdDetail::paginate(10)
        ]);
    }
}
