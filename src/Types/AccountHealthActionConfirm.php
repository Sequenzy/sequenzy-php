<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountHealthActionConfirm extends JsonSerializableType
{
    /**
     * @var ?string $confirmLabel
     */
    #[JsonProperty('confirmLabel')]
    public ?string $confirmLabel;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $destructive
     */
    #[JsonProperty('destructive')]
    public ?bool $destructive;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   confirmLabel?: ?string,
     *   description?: ?string,
     *   destructive?: ?bool,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->confirmLabel = $values['confirmLabel'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->destructive = $values['destructive'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
