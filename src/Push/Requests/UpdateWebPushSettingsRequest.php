<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateWebPushSettingsRequest extends JsonSerializableType
{
    /**
     * @var ?string $defaultIconUrl Default https icon used when a message has no icon. null or an empty string clears it.
     */
    #[JsonProperty('defaultIconUrl')]
    public ?string $defaultIconUrl;

    /**
     * @var ?bool $enabled Turn web push on or off. Provide enabled and/or defaultIconUrl.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @param array{
     *   defaultIconUrl?: ?string,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->defaultIconUrl = $values['defaultIconUrl'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
    }
}
