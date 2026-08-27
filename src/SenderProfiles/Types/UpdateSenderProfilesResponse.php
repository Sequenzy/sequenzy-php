<?php

namespace Sequenzy\SenderProfiles\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SenderProfileSummary;

class UpdateSenderProfilesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $renamed False when the profile already carried that name, so nothing changed.
     */
    #[JsonProperty('renamed')]
    public ?bool $renamed;

    /**
     * @var ?SenderProfileSummary $senderProfile
     */
    #[JsonProperty('senderProfile')]
    public ?SenderProfileSummary $senderProfile;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   renamed?: ?bool,
     *   senderProfile?: ?SenderProfileSummary,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->renamed = $values['renamed'] ?? null;
        $this->senderProfile = $values['senderProfile'] ?? null;
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
