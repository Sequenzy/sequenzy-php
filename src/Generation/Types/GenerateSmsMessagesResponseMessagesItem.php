<?php

namespace Sequenzy\Generation\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GenerateSmsMessagesResponseMessagesItem extends JsonSerializableType
{
    /**
     * @var ?float $characterCount
     */
    #[JsonProperty('characterCount')]
    public ?float $characterCount;

    /**
     * @var ?value-of<GenerateSmsMessagesResponseMessagesItemEncoding> $encoding
     */
    #[JsonProperty('encoding')]
    public ?string $encoding;

    /**
     * @var ?float $segments
     */
    #[JsonProperty('segments')]
    public ?float $segments;

    /**
     * @var ?string $text
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @param array{
     *   characterCount?: ?float,
     *   encoding?: ?value-of<GenerateSmsMessagesResponseMessagesItemEncoding>,
     *   segments?: ?float,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->characterCount = $values['characterCount'] ?? null;
        $this->encoding = $values['encoding'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->text = $values['text'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
