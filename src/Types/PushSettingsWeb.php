<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushSettingsWeb extends JsonSerializableType
{
    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $vapidPublicKey Public VAPID key browsers subscribe with. null while web push is off.
     */
    #[JsonProperty('vapidPublicKey')]
    public ?string $vapidPublicKey;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   vapidPublicKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->vapidPublicKey = $values['vapidPublicKey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
