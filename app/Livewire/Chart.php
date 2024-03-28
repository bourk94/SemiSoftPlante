<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Chart extends Component
{
    public $humidity;
    public $temperature;
    public $loadHumidity = false;
    public $loadTemperature = false;

    public function render()
    {
        return view('livewire.chart');
    }

    public function mount()
    {
        $this->loadData();
    }

    public function getHumidity()
    {
        if (!$this->loadHumidity) {
            $this->loadHumidity = true;
            return DB::table('room')->orderBy('id', 'desc')->take(100)->pluck('humidity');
        }
        return DB::table('room')->orderBy('id', 'desc')->value('humidity');
    }
    
    public function getTemperature()
    {
        if (!$this->loadTemperature) {
            $this->loadTemperature = true;
            return DB::table('room')->orderBy('id', 'desc')->take(100)->pluck('temperature');
        } 
        return DB::table('room')->orderBy('id', 'desc')->value('temperature');
    }

    #[On('dataLoaded')]
    public function loadData()
    {
    $this->humidity = $this->getHumidity();
    $this->temperature = $this->getTemperature();
    
    sleep(1);
    
    $this->dispatch('dataLoaded');
    }
}
