<?php

namespace Sequenzy\AudienceSyncs\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AudienceSync;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListAudienceSyncsResponse extends JsonSerializableType
{
    /**
     * @var ?array<AudienceSync> $audienceSyncs
     */
    #[JsonProperty('audienceSyncs'), ArrayType([AudienceSync::class])]
    public ?array $audienceSyncs;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   audienceSyncs?: ?array<AudienceSync>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceSyncs = $values['audienceSyncs'] ?? null;
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
