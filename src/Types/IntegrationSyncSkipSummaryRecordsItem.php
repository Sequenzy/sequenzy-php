<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IntegrationSyncSkipSummaryRecordsItem extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?value-of<IntegrationSyncSkipSummaryRecordsItemOutcome> $outcome
     */
    #[JsonProperty('outcome')]
    public ?string $outcome;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $reasonCode
     */
    #[JsonProperty('reasonCode')]
    public ?string $reasonCode;

    /**
     * @param array{
     *   email?: ?string,
     *   outcome?: ?value-of<IntegrationSyncSkipSummaryRecordsItemOutcome>,
     *   reason?: ?string,
     *   reasonCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->outcome = $values['outcome'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->reasonCode = $values['reasonCode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
