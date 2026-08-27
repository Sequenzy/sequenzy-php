<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\IntegrationSummary;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<IntegrationSummary> $integrations
     */
    #[JsonProperty('integrations'), ArrayType([IntegrationSummary::class])]
    public ?array $integrations;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   integrations?: ?array<IntegrationSummary>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->integrations = $values['integrations'] ?? null;
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
