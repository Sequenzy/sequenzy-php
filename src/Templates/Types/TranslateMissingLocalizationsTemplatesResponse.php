<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TranslateMissingLocalizationsTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $locales Locales checked for missing translations.
     */
    #[JsonProperty('locales'), ArrayType(['string'])]
    public ?array $locales;

    /**
     * @var ?int $queuedEmails Emails with at least one translation queued. 0 when nothing is missing.
     */
    #[JsonProperty('queuedEmails')]
    public ?int $queuedEmails;

    /**
     * @var ?int $queuedTranslations Email and locale pairs queued.
     */
    #[JsonProperty('queuedTranslations')]
    public ?int $queuedTranslations;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   locales?: ?array<string>,
     *   queuedEmails?: ?int,
     *   queuedTranslations?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
        $this->queuedEmails = $values['queuedEmails'] ?? null;
        $this->queuedTranslations = $values['queuedTranslations'] ?? null;
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
