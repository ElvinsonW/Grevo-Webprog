<?php

namespace App\Livewire;

use Livewire\Component;

class CarbonCalculator extends Component
{
    public $step = 1;
    public $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, $q12;

    public function nextStep(){
        if($this->step < 12){
            $this->step++;
        }
    }

    public function prevStep(){
        if($this->step > 1){
            $this->step--;
        }
    }

    public function calculateCarbon(){
        $carbon = 0;
        
        for($i = 1 ; $i <= 12 ; $i++){
            $question = 'q' + $i;
            $carbon += (int)($this->$question);
        }
        return view('carbon-result', ["carbon" => $carbon]);
    }

    public function render()
    {
        return view('livewire.carbon-calculator');
    }
}
