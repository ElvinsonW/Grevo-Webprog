<?php

namespace App\Livewire;

use Livewire\Component;

class CarbonCalculator extends Component
{
    public $step = 1;
    public $answer = [-1];
    public $error;

    public function nextStep(){
        if($this->answer[$this->step-1] == -1){
            $this->error = "Please answer the question!";
        } else {
            if($this->step < 12){
                $this->error = "";
                $this->step++;
            }
        }
    }

    public function prevStep(){
        if($this->step > 1){
            $this->step--;
        }
    }

    public function endQuestioner(){
        $carbon = 0;
        
        for($i = 1 ; $i <= 12 ; $i++){
            $carbon += (int)($this->answer[$i-1]);
        }
        return redirect()->route('carbon-calculator.result', ["carbon" => $carbon]);
    }

    public function getProgressProperty()
    {
        return floor((($this->step - 1) / 12) * 100);
    }

    public function render()
    {
        return view('livewire.carbon-calculator');
    }
}
