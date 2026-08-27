<?php

namespace Sequenzy\AudienceSyncs\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\AudienceSyncs\Types\UpdateAudienceSyncsRequestFrequency;
use Sequenzy\Core\Json\JsonProperty;

class UpdateAudienceSyncsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateAudienceSyncsRequestFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var ?bool $isActive false pauses the sync, true resumes it.
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @param array{
     *   frequency?: ?value-of<UpdateAudienceSyncsRequestFrequency>,
     *   isActive?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->frequency = $values['frequency'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
    }
}
