<?php

namespace Sequenzy\SenderProfiles\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\ReplyProfileSummary;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\SenderProfileSummary;

class ListSenderProfilesResponse extends JsonSerializableType
{
    /**
     * @var ?string $defaultReplyProfileId
     */
    #[JsonProperty('defaultReplyProfileId')]
    public ?string $defaultReplyProfileId;

    /**
     * @var ?string $defaultSenderProfileId
     */
    #[JsonProperty('defaultSenderProfileId')]
    public ?string $defaultSenderProfileId;

    /**
     * @var ?array<ReplyProfileSummary> $replyProfiles
     */
    #[JsonProperty('replyProfiles'), ArrayType([ReplyProfileSummary::class])]
    public ?array $replyProfiles;

    /**
     * @var ?array<SenderProfileSummary> $senderProfiles
     */
    #[JsonProperty('senderProfiles'), ArrayType([SenderProfileSummary::class])]
    public ?array $senderProfiles;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   defaultReplyProfileId?: ?string,
     *   defaultSenderProfileId?: ?string,
     *   replyProfiles?: ?array<ReplyProfileSummary>,
     *   senderProfiles?: ?array<SenderProfileSummary>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->defaultReplyProfileId = $values['defaultReplyProfileId'] ?? null;
        $this->defaultSenderProfileId = $values['defaultSenderProfileId'] ?? null;
        $this->replyProfiles = $values['replyProfiles'] ?? null;
        $this->senderProfiles = $values['senderProfiles'] ?? null;
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
