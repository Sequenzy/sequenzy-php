<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RemoveSuppressionsResponse extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?array<string> $reactivatedSubscriberIds
     */
    #[JsonProperty('reactivatedSubscriberIds'), ArrayType(['string'])]
    public ?array $reactivatedSubscriberIds;

    /**
     * @var ?array<string, mixed> $remainingSuppression Recipient suppression status after cleanup
     */
    #[JsonProperty('remainingSuppression'), ArrayType(['string' => 'mixed'])]
    public ?array $remainingSuppression;

    /**
     * @var ?bool $removed
     */
    #[JsonProperty('removed')]
    public ?bool $removed;

    /**
     * @var ?bool $removedLocalBounce
     */
    #[JsonProperty('removedLocalBounce')]
    public ?bool $removedLocalBounce;

    /**
     * @var ?array<string> $removedSesRegions Always empty for company-authenticated removal; SES account-level suppressions are protected.
     */
    #[JsonProperty('removedSesRegions'), ArrayType(['string'])]
    public ?array $removedSesRegions;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   email?: ?string,
     *   reactivatedSubscriberIds?: ?array<string>,
     *   remainingSuppression?: ?array<string, mixed>,
     *   removed?: ?bool,
     *   removedLocalBounce?: ?bool,
     *   removedSesRegions?: ?array<string>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->reactivatedSubscriberIds = $values['reactivatedSubscriberIds'] ?? null;
        $this->remainingSuppression = $values['remainingSuppression'] ?? null;
        $this->removed = $values['removed'] ?? null;
        $this->removedLocalBounce = $values['removedLocalBounce'] ?? null;
        $this->removedSesRegions = $values['removedSesRegions'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
