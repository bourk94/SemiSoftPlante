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

class HumiditySensor extends Component
{
    public $humidity;
    protected ?MqttClient $mqtt = null;

    public function render()
    {
        return view('livewire.humidity-sensor');
    }

    public function boot()
    {
        // $this->updateHumidity();
    }

    public function updateHumidity()
    {
        try {

            if ($this->mqtt === null || !$this->mqtt->isConnected()) {
                $this->mqtt = MQTT::connection();
            }

            $this->mqtt->subscribe('humidity', function (string $topic, int $message) {
                $this->humidity = $message;
                $this->mqtt->interrupt();
            }, 0);
            $this->mqtt->loop(true, true, 10);

        } catch (MqttClientException | \Error  | \Exception $e) {
            Log::error($e);
        }
    }
}
