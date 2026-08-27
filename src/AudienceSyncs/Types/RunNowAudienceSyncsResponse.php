<?php

namespace Sequenzy\AudienceSyncs\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RunNowAudienceSyncsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $queued
     */
    #[JsonProperty('queued')]
    public ?bool $queued;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   queued?: ?bool,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->queued = $values['queued'] ?? null;
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
