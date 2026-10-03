<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\PushSettingsAndroid;
use Sequenzy\Types\PushSettingsIos;
use Sequenzy\Types\PushSettingsWeb;
use Sequenzy\Core\Json\JsonProperty;

/**
 * @property ?PushSettingsAndroid $android
 * @property ?string $defaultIconUrl
 * @property ?PushSettingsIos $ios
 * @property ?PushSettingsWeb $web
 */
trait PushSettings
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
}
