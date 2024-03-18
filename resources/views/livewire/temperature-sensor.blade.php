<div class="w3-half">
    <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa-solid fa-temperature-three-quarters w3-xxxlarge"></i></div>
        <div class="w3-left">
        <h4>Température</h4>
        </div>
        <div class="w3-clear"></div>
        <h3 wire:poll.visible.5s="updateTemperature">{{ $temperature }} °C</h3>
    </div>
</div>