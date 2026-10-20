<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListInAppTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<ListInAppTemplatesResponseTemplatesItem> $templates
     */
    #[JsonProperty('templates'), ArrayType([ListInAppTemplatesResponseTemplatesItem::class])]
    public ?array $templates;

    /**
     * @param array{
     *   success?: ?bool,
     *   templates?: ?array<ListInAppTemplatesResponseTemplatesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->templates = $values['templates'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
