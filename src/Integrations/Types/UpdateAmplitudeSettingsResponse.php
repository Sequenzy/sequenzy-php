<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\IntegrationSummary;

class UpdateAmplitudeSettingsResponse extends JsonSerializableType
{
    /**
     * @var UpdateAmplitudeSettingsResponseEventSettings $eventSettings
     */
    #[JsonProperty('eventSettings')]
    public UpdateAmplitudeSettingsResponseEventSettings $eventSettings;

    /**
     * @var IntegrationSummary $integration
     */
    #[JsonProperty('integration')]
    public IntegrationSummary $integration;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   eventSettings: UpdateAmplitudeSettingsResponseEventSettings,
     *   integration: IntegrationSummary,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventSettings = $values['eventSettings'];
        $this->integration = $values['integration'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
