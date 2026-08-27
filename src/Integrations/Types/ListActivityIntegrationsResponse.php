<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\IntegrationActivityEntry;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListActivityIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<IntegrationActivityEntry> $activity
     */
    #[JsonProperty('activity'), ArrayType([IntegrationActivityEntry::class])]
    public ?array $activity;

    /**
     * @var ?string $note
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $windowHours
     */
    #[JsonProperty('windowHours')]
    public ?int $windowHours;

    /**
     * @param array{
     *   activity?: ?array<IntegrationActivityEntry>,
     *   note?: ?string,
     *   success?: ?bool,
     *   windowHours?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activity = $values['activity'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->windowHours = $values['windowHours'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
