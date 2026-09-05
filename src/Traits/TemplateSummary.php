<?php

namespace Sequenzy\Traits;

use DateTime;
use Sequenzy\Types\EmailPreset;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property ?DateTime $createdAt
 * @property ?value-of<EmailPreset> $emailPreset
 * @property ?string $id
 * @property ?bool $isTemplate
 * @property ?array<string> $labels
 * @property ?array<array<string, mixed>> $localizations
 * @property ?string $name
 * @property ?string $previewText
 * @property ?string $subject
 * @property ?DateTime $updatedAt
 */
trait TemplateSummary
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
     * True when this email is marked as a reusable master design.
     * Master designs are offered first when a sequence step or campaign
     * starts from an existing email, and starting from one always creates
     * an independent copy (never a shared link).
     *
     * @var ?bool $isTemplate
     */
    #[JsonProperty('isTemplate')]
    public ?bool $isTemplate;

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
}
