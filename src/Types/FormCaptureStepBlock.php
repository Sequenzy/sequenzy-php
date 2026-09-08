<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class FormCaptureStepBlock extends JsonSerializableType
{
    /**
     * @var array<string> $blockIds
     */
    #[JsonProperty('blockIds'), ArrayType(['string'])]
    public array $blockIds;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @param array{
     *   blockIds: array<string>,
     *   description: string,
     *   id: string,
     *   title: string,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blockIds = $values['blockIds'];
        $this->description = $values['description'];
        $this->id = $values['id'];
        $this->sectionId = $values['sectionId'] ?? null;
        $this->title = $values['title'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
