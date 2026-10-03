<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SyncLocalizationsTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $queuedLocales
     */
    #[JsonProperty('queuedLocales'), ArrayType(['string'])]
    public ?array $queuedLocales;

    /**
     * @var ?int $queuedVariantCount
     */
    #[JsonProperty('queuedVariantCount')]
    public ?int $queuedVariantCount;

    /**
     * @var ?array<string> $skippedLocales Requested locales kept because someone edited them. Only returned when skipEdited is true.
     */
    #[JsonProperty('skippedLocales'), ArrayType(['string'])]
    public ?array $skippedLocales;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $templateId
     */
    #[JsonProperty('templateId')]
    public ?string $templateId;

    /**
     * @param array{
     *   queuedLocales?: ?array<string>,
     *   queuedVariantCount?: ?int,
     *   skippedLocales?: ?array<string>,
     *   success?: ?bool,
     *   templateId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->queuedLocales = $values['queuedLocales'] ?? null;
        $this->queuedVariantCount = $values['queuedVariantCount'] ?? null;
        $this->skippedLocales = $values['skippedLocales'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
