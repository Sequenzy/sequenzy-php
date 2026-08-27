<?php

namespace Sequenzy\Generation\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GenerateSmsMessagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<GenerateSmsMessagesResponseMessagesItem> $messages
     */
    #[JsonProperty('messages'), ArrayType([GenerateSmsMessagesResponseMessagesItem::class])]
    public ?array $messages;

    /**
     * @var ?string $prompt
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   messages?: ?array<GenerateSmsMessagesResponseMessagesItem>,
     *   prompt?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->messages = $values['messages'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
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
