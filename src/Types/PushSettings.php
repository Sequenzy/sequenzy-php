<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushSettings extends JsonSerializableType
{
    /**
     * @var ?PushSettingsAndroid $android
     */
    #[JsonProperty('android')]
    public ?PushSettingsAndroid $android;

    /**
     * @var ?string $defaultIconUrl Custom web push icon. When null, web pushes use the company logo (brandIconUrl on Get Push Settings).
     */
    #[JsonProperty('defaultIconUrl')]
    public ?string $defaultIconUrl;

    /**
     * @var ?PushSettingsIos $ios
     */
    #[JsonProperty('ios')]
    public ?PushSettingsIos $ios;

    /**
     * @var ?PushSettingsWeb $web
     */
    #[JsonProperty('web')]
    public ?PushSettingsWeb $web;

    /**
     * @param array{
     *   android?: ?PushSettingsAndroid,
     *   defaultIconUrl?: ?string,
     *   ios?: ?PushSettingsIos,
     *   web?: ?PushSettingsWeb,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->android = $values['android'] ?? null;
        $this->defaultIconUrl = $values['defaultIconUrl'] ?? null;
        $this->ios = $values['ios'] ?? null;
        $this->web = $values['web'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
