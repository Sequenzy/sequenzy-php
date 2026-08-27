<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class TemplateLocalization extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $lastError
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?string $locale
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $sourceHash
     */
    #[JsonProperty('sourceHash')]
    public ?string $sourceHash;

    /**
     * @var ?value-of<TemplateLocalizationStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?DateTime $syncedAt
     */
    #[JsonProperty('syncedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $syncedAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   blocks?: ?array<EmailBlock>,
     *   createdAt?: ?DateTime,
     *   lastError?: ?string,
     *   locale?: ?string,
     *   previewText?: ?string,
     *   sourceHash?: ?string,
     *   status?: ?value-of<TemplateLocalizationStatus>,
     *   subject?: ?string,
     *   syncedAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->locale = $values['locale'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->sourceHash = $values['sourceHash'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->syncedAt = $values['syncedAt'] ?? null;
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
