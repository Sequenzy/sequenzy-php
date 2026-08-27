<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\IntegrationPixelState;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\IntegrationPixelStatePixel;

class ActivatePixelIntegrationsResponse extends JsonSerializableType
{
    use IntegrationPixelState;

    /**
     * @var ?bool $changed False when the pixel was already installed and current.
     */
    #[JsonProperty('changed')]
    public ?bool $changed;

    /**
     * @var ?bool $created True when a new pixel was installed.
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?bool $updated True when an existing pixel was repointed.
     */
    #[JsonProperty('updated')]
    public ?bool $updated;

    /**
     * @param array{
     *   dependentEvents?: ?array<string>,
     *   integrationId?: ?string,
     *   message?: ?string,
     *   pixel?: ?IntegrationPixelStatePixel,
     *   provider?: ?string,
     *   shopDomain?: ?string,
     *   success?: ?bool,
     *   changed?: ?bool,
     *   created?: ?bool,
     *   updated?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dependentEvents = $values['dependentEvents'] ?? null;
        $this->integrationId = $values['integrationId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->pixel = $values['pixel'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->shopDomain = $values['shopDomain'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->changed = $values['changed'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->updated = $values['updated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
