<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

class SendingStatusMetricsWindow extends JsonSerializableType
{
    /**
     * @var ?DateTime $bounceResetAt
     */
    #[JsonProperty('bounceResetAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $bounceResetAt;

    /**
     * @var ?DateTime $complaintResetAt
     */
    #[JsonProperty('complaintResetAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $complaintResetAt;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $expiresAt Always null. Enforcement totals are all-time from the watermark, so a paused rate never expires on its own.
     */
    #[JsonProperty('expiresAt')]
    public ?string $expiresAt;

    /**
     * @var ?value-of<SendingStatusMetricsWindowKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @param array{
     *   bounceResetAt?: ?DateTime,
     *   complaintResetAt?: ?DateTime,
     *   description?: ?string,
     *   expiresAt?: ?string,
     *   kind?: ?value-of<SendingStatusMetricsWindowKind>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounceResetAt = $values['bounceResetAt'] ?? null;
        $this->complaintResetAt = $values['complaintResetAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->kind = $values['kind'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
