<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class BulkSubscriberTagResponse extends JsonSerializableType
{
    /**
     * @var ?int $failed
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?array<BulkSubscriberTagResponseFailuresItem> $failures Up to 50 per-subscriber failures.
     */
    #[JsonProperty('failures'), ArrayType([BulkSubscriberTagResponseFailuresItem::class])]
    public ?array $failures;

    /**
     * @var ?int $matched Existing subscribers resolved from those identifiers.
     */
    #[JsonProperty('matched')]
    public ?int $matched;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?BulkSubscriberTagResponseNotFound $notFound Identifiers that did not resolve. These subscribers were not created.
     */
    #[JsonProperty('notFound')]
    public ?BulkSubscriberTagResponseNotFound $notFound;

    /**
     * @var ?int $requested Identifiers supplied in the request.
     */
    #[JsonProperty('requested')]
    public ?int $requested;

    /**
     * @var ?bool $success False when any matched subscriber failed to update.
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?bool $triggeredAutomations Add only. Whether tag automations were allowed to run.
     */
    #[JsonProperty('triggeredAutomations')]
    public ?bool $triggeredAutomations;

    /**
     * @var ?int $unchanged Subscribers that were already in the target state.
     */
    #[JsonProperty('unchanged')]
    public ?int $unchanged;

    /**
     * @var ?int $updated Subscribers whose tags actually changed.
     */
    #[JsonProperty('updated')]
    public ?int $updated;

    /**
     * @param array{
     *   failed?: ?int,
     *   failures?: ?array<BulkSubscriberTagResponseFailuresItem>,
     *   matched?: ?int,
     *   message?: ?string,
     *   notFound?: ?BulkSubscriberTagResponseNotFound,
     *   requested?: ?int,
     *   success?: ?bool,
     *   tags?: ?array<string>,
     *   triggeredAutomations?: ?bool,
     *   unchanged?: ?int,
     *   updated?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->failed = $values['failed'] ?? null;
        $this->failures = $values['failures'] ?? null;
        $this->matched = $values['matched'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->notFound = $values['notFound'] ?? null;
        $this->requested = $values['requested'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->triggeredAutomations = $values['triggeredAutomations'] ?? null;
        $this->unchanged = $values['unchanged'] ?? null;
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
