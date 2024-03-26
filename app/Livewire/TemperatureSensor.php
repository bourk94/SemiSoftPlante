<?php
declare(strict_types=1);

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithDispatch;
use Illuminate\Support\Facades\Event;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Examples\Shared\SimpleLogger;
use Psr\Log\LogLevel;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Log;

class TemperatureSensor extends Component
{
    public $temperature;
    protected ?MqttClient $mqtt = null;

    public function render()
    {
        return view('livewire.temperature-sensor');
    }

    public function boot()
    {
        // $this->updateTemperature();
    }

    public function updateTemperature()
    {
        try {

            if ($this->mqtt === null || !$this->mqtt->isConnected()) {
                $this->mqtt = MQTT::connection();
            }

            $this->mqtt->subscribe('temperature', function (string $topic, float $message) {
                $this->temperature = round($message, 2);
                $this->mqtt->interrupt();
            }, 0);
            $this->mqtt->loop(true, true, 10);

        } catch (MqttClientException | \Error  | \Exception $e) {
            Log::error($e);
        }
    }
}
