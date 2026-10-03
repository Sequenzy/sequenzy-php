<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Plain-text preview of the latest subscriber or team reply, with quoted history, signatures and markup removed and truncated to 200 characters. Internal notes are not included. Null when no reply has readable text.
 */
class ConversationSummaryLastMessagePreview extends JsonSerializableType
{
    /**
     * @var string $text
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var value-of<ConversationSummaryLastMessagePreviewType> $type `inbound` for a subscriber reply, `outbound` for a team reply.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   text: string,
     *   type: value-of<ConversationSummaryLastMessagePreviewType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->text = $values['text'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
