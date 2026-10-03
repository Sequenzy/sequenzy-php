<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ConversationSummaryContext extends JsonSerializableType
{
    /**
     * @var ?string $label Campaign or sequence name, "Transactional", or "Inbox".
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $type Where the conversation started: campaign, sequence, or transactional for replies to those emails, inbox for email sent to the company inbox address, or unknown.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   label?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
