<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountOrganizationIdCandidate;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class DetectOrganizationIdsAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?array<AccountOrganizationIdCandidate> $candidates
     */
    #[JsonProperty('candidates'), ArrayType([AccountOrganizationIdCandidate::class])]
    public ?array $candidates;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   candidates?: ?array<AccountOrganizationIdCandidate>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->candidates = $values['candidates'] ?? null;
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
