<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountOrganizationIdJob;
use Sequenzy\Core\Json\JsonProperty;

class GetOrganizationIdJobAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?AccountOrganizationIdJob $job
     */
    #[JsonProperty('job')]
    public ?AccountOrganizationIdJob $job;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   job?: ?AccountOrganizationIdJob,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->job = $values['job'] ?? null;
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
