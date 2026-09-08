<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class SubscriberOperation extends JsonSerializableType
{
    /**
     * @var string $companyId
     */
    #[JsonProperty('companyId')]
    public string $companyId;

    /**
     * @var ?DateTime $completedAt
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var DateTime $expiresAt Processing deadline while active; retention deadline after completion.
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $expiresAt;

    /**
     * @var int $failed
     */
    #[JsonProperty('failed')]
    public int $failed;

    /**
     * @var array<SubscriberOperationFailuresItem> $failures
     */
    #[JsonProperty('failures'), ArrayType([SubscriberOperationFailuresItem::class])]
    public array $failures;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<SubscriberOperationKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var int $processed
     */
    #[JsonProperty('processed')]
    public int $processed;

    /**
     * @var value-of<SubscriberOperationStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $succeeded
     */
    #[JsonProperty('succeeded')]
    public int $succeeded;

    /**
     * @var int $total Selected contacts; grows while selection is queued.
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   companyId: string,
     *   createdAt: DateTime,
     *   expiresAt: DateTime,
     *   failed: int,
     *   failures: array<SubscriberOperationFailuresItem>,
     *   id: string,
     *   kind: value-of<SubscriberOperationKind>,
     *   processed: int,
     *   status: value-of<SubscriberOperationStatus>,
     *   succeeded: int,
     *   total: int,
     *   completedAt?: ?DateTime,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->completedAt = $values['completedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->error = $values['error'] ?? null;
        $this->expiresAt = $values['expiresAt'];
        $this->failed = $values['failed'];
        $this->failures = $values['failures'];
        $this->id = $values['id'];
        $this->kind = $values['kind'];
        $this->processed = $values['processed'];
        $this->status = $values['status'];
        $this->succeeded = $values['succeeded'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
