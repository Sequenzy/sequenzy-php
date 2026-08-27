<?php

namespace Sequenzy\SenderProfiles\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\ReplyProfileSummary;

class UpdateReplyProfileResponse extends JsonSerializableType
{
    /**
     * @var ?bool $renamed False when the profile already carried that name, so nothing changed.
     */
    #[JsonProperty('renamed')]
    public ?bool $renamed;

    /**
     * @var ?ReplyProfileSummary $replyProfile
     */
    #[JsonProperty('replyProfile')]
    public ?ReplyProfileSummary $replyProfile;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   renamed?: ?bool,
     *   replyProfile?: ?ReplyProfileSummary,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->renamed = $values['renamed'] ?? null;
        $this->replyProfile = $values['replyProfile'] ?? null;
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
