<div class="p-6 bg-blue-500 rounded-xl shadow-md flex items-center w-6/12">
  <div class="flex-shrink-0 mr-3">
    <i class="fa-solid fa-5x fa-droplet"></i>  </div>
  <div>
    <div class="text-xl font-medium  text-black">Capteur d'humidité</div>
    <p class="text-gray-900">Taux d'humidité : <span wire:poll.visible.5s="updateHumidity" class="font-bold">{{ $humidity }} %</span> </p>
  </div>
</div>