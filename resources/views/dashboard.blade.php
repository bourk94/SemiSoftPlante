<x-app-layout>
    <div class="flex content-center w-6/12 mx-auto space-x-20 my-10">
        <livewire:TemperatureSensor />
        <livewire:HumiditySensor />
    </div>
    <div class="w-9/12 mx-auto">
        <livewire:Chart/>
    </div>  
</x-app-layout>