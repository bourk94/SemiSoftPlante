<div class="p-6 bg-red-500 rounded-xl shadow-md flex items-center w-6/12">
  <div class="flex-shrink-0 mr-3">
        <i class="fa-solid fa-5x fa-temperature-half"></i>
  </div>
  <div>
    <div class="text-xl font-medium text-black">Capteur de température</div>
    <p class="text-gray-900">Temperature: <span wire:poll.visible.5s="updateTemperature" class="font-bold">{{ $temperature }} °C</span> </p>
  </div>
</div>