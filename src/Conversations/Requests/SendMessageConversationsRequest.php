<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Conversations\Types\SendMessageConversationsRequestAttachmentsItem;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Conversations\Types\SendMessageConversationsRequestType;

class SendMessageConversationsRequest extends JsonSerializableType
{
    /**
     * @var ?array<SendMessageConversationsRequestAttachmentsItem> $attachments Files to attach, up to 10 and 15 MB total after decoding. Requires attachment storage on the server (see Get Inbox Address).
     */
    #[JsonProperty('attachments'), ArrayType([SendMessageConversationsRequestAttachmentsItem::class])]
    public ?array $attachments;

    /**
     * @var ?string $bodyHtml HTML body. Outbound messages require bodyText or bodyHtml.
     */
    #[JsonProperty('bodyHtml')]
    public ?string $bodyHtml;

    /**
     * @var ?string $bodyText Plain text body. Outbound messages require bodyText or bodyHtml.
     */
    #[JsonProperty('bodyText')]
    public ?string $bodyText;

    /**
     * @var ?string $senderProfileId Sender profile to send an outbound reply from. Its sending domain must be verified. Ignored for notes. When omitted, the reply is sent from the API key owner's email address, which must be on one of your verified sending domains.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?string $subject Message subject. Defaults to the conversation subject.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?value-of<SendMessageConversationsRequestType> $type outbound sends an email reply, note adds an internal team note.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   attachments?: ?array<SendMessageConversationsRequestAttachmentsItem>,
     *   bodyHtml?: ?string,
     *   bodyText?: ?string,
     *   senderProfileId?: ?string,
     *   subject?: ?string,
     *   type?: ?value-of<SendMessageConversationsRequestType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attachments = $values['attachments'] ?? null;
        $this->bodyHtml = $values['bodyHtml'] ?? null;
        $this->bodyText = $values['bodyText'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->type = $values['type'] ?? null;
    }
}
