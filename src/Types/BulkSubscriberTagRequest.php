<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Provide tags plus at least one identifier list. Identifier lists may be combined and total at most 500 entries per request.
 */
class BulkSubscriberTagRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $emails Subscriber emails to update.
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public ?array $emails;

    /**
     * @var ?array<string> $externalIds Customer-owned subscriber IDs to update.
     */
    #[JsonProperty('externalIds'), ArrayType(['string'])]
    public ?array $externalIds;

    /**
     * @var ?array<string> $subscriberIds Sequenzy subscriber IDs to update.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @var array<string> $tags Tag names applied to every matched subscriber. Names are normalized the same way as single-subscriber tag endpoints.
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public array $tags;

    /**
     * @var ?bool $triggerAutomations Add only. Whether tag_added sequences may enroll these contacts. Defaults to false and requires the automations:trigger scope.
     */
    #[JsonProperty('triggerAutomations')]
    public ?bool $triggerAutomations;

    /**
     * @param array{
     *   tags: array<string>,
     *   emails?: ?array<string>,
     *   externalIds?: ?array<string>,
     *   subscriberIds?: ?array<string>,
     *   triggerAutomations?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->externalIds = $values['externalIds'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
        $this->tags = $values['tags'];
        $this->triggerAutomations = $values['triggerAutomations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
