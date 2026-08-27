<?php

namespace Sequenzy\AudienceSyncs\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AudienceSync;
use Sequenzy\Core\Json\JsonProperty;

class CreateAudienceSyncsResponse extends JsonSerializableType
{
    /**
     * @var ?AudienceSync $audienceSync
     */
    #[JsonProperty('audienceSync')]
    public ?AudienceSync $audienceSync;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   audienceSync?: ?AudienceSync,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceSync = $values['audienceSync'] ?? null;
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
