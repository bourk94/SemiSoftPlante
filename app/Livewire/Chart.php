<?php

namespace App\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Charts\ColumnChart;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Chart extends Component
{

    public function render()
    {
        $this->columnChartModel = 
        (new ColumnChartModel())
        ->setTitle('Expenses by Type')
        ->addColumn('Food', 100, '#f6ad55')
        ->addColumn('Shopping', 200, '#fc8181')
        ->addColumn('Travel', 300, '#90cdf4')
        ;
        return view('livewire.chart');
    }
}
