<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ImportEventsSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?int $duplicates Events skipped because their eventId was already recorded.
     */
    #[JsonProperty('duplicates')]
    public ?int $duplicates;

    /**
     * @var ?string $error First failure message when any event failed.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?int $failed Events that failed to record.
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?array<ImportEventsSubscribersResponseFailuresItem> $failures Failed events by input index.
     */
    #[JsonProperty('failures'), ArrayType([ImportEventsSubscribersResponseFailuresItem::class])]
    public ?array $failures;

    /**
     * @var ?int $recorded Events recorded by this request.
     */
    #[JsonProperty('recorded')]
    public ?int $recorded;

    /**
     * @var ?int $sideEffectFailed Receipt rows whose downstream side effects or historical automation shielding failed. This is orthogonal to receipt accounting and may accompany either recorded or duplicate rows during recovery.
     */
    #[JsonProperty('sideEffectFailed')]
    public ?int $sideEffectFailed;

    /**
     * @var ?array<ImportEventsSubscribersResponseSideEffectFailuresItem> $sideEffectFailures Post-write failures by input index. The receipt exists (new or duplicate); retry with the same eventId for recovery.
     */
    #[JsonProperty('sideEffectFailures'), ArrayType([ImportEventsSubscribersResponseSideEffectFailuresItem::class])]
    public ?array $sideEffectFailures;

    /**
     * @var ?int $subscribers Distinct subscriber identities in the request.
     */
    #[JsonProperty('subscribers')]
    public ?int $subscribers;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $total Events submitted in this request.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   duplicates?: ?int,
     *   error?: ?string,
     *   failed?: ?int,
     *   failures?: ?array<ImportEventsSubscribersResponseFailuresItem>,
     *   recorded?: ?int,
     *   sideEffectFailed?: ?int,
     *   sideEffectFailures?: ?array<ImportEventsSubscribersResponseSideEffectFailuresItem>,
     *   subscribers?: ?int,
     *   success?: ?bool,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->duplicates = $values['duplicates'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->failed = $values['failed'] ?? null;
        $this->failures = $values['failures'] ?? null;
        $this->recorded = $values['recorded'] ?? null;
        $this->sideEffectFailed = $values['sideEffectFailed'] ?? null;
        $this->sideEffectFailures = $values['sideEffectFailures'] ?? null;
        $this->subscribers = $values['subscribers'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
