<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\AccountOrganizationIdJob;

class CreateFromOrganizationIdAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $alreadyRunning True when a run for this key was already queued or running, so none was started.
     */
    #[JsonProperty('alreadyRunning')]
    public ?bool $alreadyRunning;

    /**
     * @var ?AccountOrganizationIdJob $job
     */
    #[JsonProperty('job')]
    public ?AccountOrganizationIdJob $job;

    /**
     * @var ?string $jobId Pass to `GET /account-suggestions/organization-ids/jobs/{jobId}`.
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   alreadyRunning?: ?bool,
     *   job?: ?AccountOrganizationIdJob,
     *   jobId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->alreadyRunning = $values['alreadyRunning'] ?? null;
        $this->job = $values['job'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
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
