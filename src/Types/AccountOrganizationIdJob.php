<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountOrganizationIdJob extends JsonSerializableType
{
    /**
     * @var ?string $error Present when `failed`.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $jobId
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?AccountOrganizationIdJobResult $result Present when `completed`.
     */
    #[JsonProperty('result')]
    public ?AccountOrganizationIdJobResult $result;

    /**
     * @var ?AccountOrganizationIdJobSettings $settings What the run reads. A run already in progress for the same `propertyKey` keeps its own `source` and `nameKey`, which may differ from a later request.
     */
    #[JsonProperty('settings')]
    public ?AccountOrganizationIdJobSettings $settings;

    /**
     * @var ?value-of<AccountOrganizationIdJobState> $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @param array{
     *   error?: ?string,
     *   jobId?: ?string,
     *   result?: ?AccountOrganizationIdJobResult,
     *   settings?: ?AccountOrganizationIdJobSettings,
     *   state?: ?value-of<AccountOrganizationIdJobState>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->result = $values['result'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->state = $values['state'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
