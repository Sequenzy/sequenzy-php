<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IntegrationEventWiringListenersItem extends JsonSerializableType
{
    /**
     * @var ?bool $acceptsNewEnrollments
     */
    #[JsonProperty('acceptsNewEnrollments')]
    public ?bool $acceptsNewEnrollments;

    /**
     * @var ?string $effectiveStatus
     */
    #[JsonProperty('effectiveStatus')]
    public ?string $effectiveStatus;

    /**
     * @var ?string $effectiveStatusSummary
     */
    #[JsonProperty('effectiveStatusSummary')]
    public ?string $effectiveStatusSummary;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @param array{
     *   acceptsNewEnrollments?: ?bool,
     *   effectiveStatus?: ?string,
     *   effectiveStatusSummary?: ?string,
     *   name?: ?string,
     *   sequenceId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->acceptsNewEnrollments = $values['acceptsNewEnrollments'] ?? null;
        $this->effectiveStatus = $values['effectiveStatus'] ?? null;
        $this->effectiveStatusSummary = $values['effectiveStatusSummary'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
