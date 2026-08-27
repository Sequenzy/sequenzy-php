<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class TemplateSummary extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?value-of<EmailPreset> $emailPreset
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string> $labels Label names assigned to this template.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?array<array<string, mixed>> $localizations
     */
    #[JsonProperty('localizations'), ArrayType([['string' => 'mixed']])]
    public ?array $localizations;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   localizations?: ?array<array<string, mixed>>,
     *   name?: ?string,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->localizations = $values['localizations'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
