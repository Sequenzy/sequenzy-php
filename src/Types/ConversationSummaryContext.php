<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ConversationSummaryContext extends JsonSerializableType
{
    /**
     * @var ?string $label Campaign or sequence name.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $type Originating email type (campaign, sequence, transactional, or unknown).
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
