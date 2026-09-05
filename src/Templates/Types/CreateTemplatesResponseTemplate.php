<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateTemplatesResponseTemplate extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isTemplate
     */
    #[JsonProperty('isTemplate')]
    public ?bool $isTemplate;

    /**
     * @var ?array<string> $labels
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @param array{
     *   id?: ?string,
     *   isTemplate?: ?bool,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   subject?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->isTemplate = $values['isTemplate'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->subject = $values['subject'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
