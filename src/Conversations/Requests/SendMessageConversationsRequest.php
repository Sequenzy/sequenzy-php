<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Conversations\Types\SendMessageConversationsRequestType;

class SendMessageConversationsRequest extends JsonSerializableType
{
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
     *   bodyHtml?: ?string,
     *   bodyText?: ?string,
     *   subject?: ?string,
     *   type?: ?value-of<SendMessageConversationsRequestType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bodyHtml = $values['bodyHtml'] ?? null;
        $this->bodyText = $values['bodyText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->type = $values['type'] ?? null;
    }
}
