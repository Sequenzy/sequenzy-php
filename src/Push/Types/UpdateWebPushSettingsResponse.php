<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\PushSettings;

class UpdateWebPushSettingsResponse extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?PushSettings $push
     */
    #[JsonProperty('push')]
    public ?PushSettings $push;

    /**
     * @var ?UpdateWebPushSettingsResponseSiteKey $siteKey Returned when the request sets enabled to true. The active web tracking key web push uses, created for the company website (and its www or apex twin) when the workspace had none. Null when there is no key and the company website is unknown or not a valid origin.
     */
    #[JsonProperty('siteKey')]
    public ?UpdateWebPushSettingsResponseSiteKey $siteKey;

    /**
     * @var ?bool $siteKeyCreated Returned when the request sets enabled to true. True when this request created the site key.
     */
    #[JsonProperty('siteKeyCreated')]
    public ?bool $siteKeyCreated;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   message?: ?string,
     *   push?: ?PushSettings,
     *   siteKey?: ?UpdateWebPushSettingsResponseSiteKey,
     *   siteKeyCreated?: ?bool,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->push = $values['push'] ?? null;
        $this->siteKey = $values['siteKey'] ?? null;
        $this->siteKeyCreated = $values['siteKeyCreated'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
