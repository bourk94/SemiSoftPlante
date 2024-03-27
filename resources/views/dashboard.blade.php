<x-app-layout>
    <div class="w3-row-padding w3-margin-bottom">
        {{-- <livewire:TemperatureSensor />
        <livewire:HumiditySensor /> --}}
        <livewire:Chart :column-chart-model="$columnChartModel"/>
    </div>
</x-app-layout>