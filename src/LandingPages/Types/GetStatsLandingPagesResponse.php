<?php

namespace Sequenzy\LandingPages\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetStatsLandingPagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $stats
     */
    #[JsonProperty('stats'), ArrayType(['string' => 'mixed'])]
    public ?array $stats;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   stats?: ?array<string, mixed>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->stats = $values['stats'] ?? null;
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
