<div class="w3-half">
    <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa-solid fa-glass-water-droplet w3-xxxlarge"></i></div>
        <div class="w3-left"> 
        <h4>Humidité</h4>
        </div>
        <div class="w3-clear"></div>
        <h3 wire:poll.visible.10s="updateHumidity">{{ $humidity }} %</h3>
    </div>
</div>
