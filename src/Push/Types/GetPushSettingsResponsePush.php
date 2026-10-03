<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\PushSettings;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\PushDeviceCounts;
use Sequenzy\Types\PushSettingsAndroid;
use Sequenzy\Types\PushSettingsIos;
use Sequenzy\Types\PushSettingsWeb;

class GetPushSettingsResponsePush extends JsonSerializableType
{
    use PushSettings;

    /**
     * @var ?string $brandIconUrl The company logo, used as the web push icon when neither the message nor defaultIconUrl sets one. Null when there is no https, non-SVG logo.
     */
    #[JsonProperty('brandIconUrl')]
    public ?string $brandIconUrl;

    /**
     * @var ?PushDeviceCounts $devices
     */
    #[JsonProperty('devices')]
    public ?PushDeviceCounts $devices;

    /**
     * @param array{
     *   android?: ?PushSettingsAndroid,
     *   defaultIconUrl?: ?string,
     *   ios?: ?PushSettingsIos,
     *   web?: ?PushSettingsWeb,
     *   brandIconUrl?: ?string,
     *   devices?: ?PushDeviceCounts,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->android = $values['android'] ?? null;
        $this->defaultIconUrl = $values['defaultIconUrl'] ?? null;
        $this->ios = $values['ios'] ?? null;
        $this->web = $values['web'] ?? null;
        $this->brandIconUrl = $values['brandIconUrl'] ?? null;
        $this->devices = $values['devices'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
