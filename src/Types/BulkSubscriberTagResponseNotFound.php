<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Identifiers that did not resolve. These subscribers were not created.
 */
class BulkSubscriberTagResponseNotFound extends JsonSerializableType
{
    /**
     * @var ?array<string> $emails
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public ?array $emails;

    /**
     * @var ?array<string> $externalIds
     */
    #[JsonProperty('externalIds'), ArrayType(['string'])]
    public ?array $externalIds;

    /**
     * @var ?array<string> $subscriberIds
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   emails?: ?array<string>,
     *   externalIds?: ?array<string>,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->externalIds = $values['externalIds'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
