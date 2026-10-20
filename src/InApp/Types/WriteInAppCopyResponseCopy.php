<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class WriteInAppCopyResponseCopy extends JsonSerializableType
{
    /**
     * @var ?string $body
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?array<WriteInAppCopyResponseCopyButtonsItem> $buttons
     */
    #[JsonProperty('buttons'), ArrayType([WriteInAppCopyResponseCopyButtonsItem::class])]
    public ?array $buttons;

    /**
     * @var ?string $eyebrow
     */
    #[JsonProperty('eyebrow')]
    public ?string $eyebrow;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   body?: ?string,
     *   buttons?: ?array<WriteInAppCopyResponseCopyButtonsItem>,
     *   eyebrow?: ?string,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->body = $values['body'] ?? null;
        $this->buttons = $values['buttons'] ?? null;
        $this->eyebrow = $values['eyebrow'] ?? null;
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
