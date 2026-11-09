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
     * @var ?int $queuedPushes Sequence push steps with at least one translation queued.
     */
    #[JsonProperty('queuedPushes')]
    public ?int $queuedPushes;

    /**
     * @var ?int $queuedPushTranslations Push step and locale pairs queued.
     */
    #[JsonProperty('queuedPushTranslations')]
    public ?int $queuedPushTranslations;

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
     *   queuedPushes?: ?int,
     *   queuedPushTranslations?: ?int,
     *   queuedTranslations?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
        $this->queuedEmails = $values['queuedEmails'] ?? null;
        $this->queuedPushes = $values['queuedPushes'] ?? null;
        $this->queuedPushTranslations = $values['queuedPushTranslations'] ?? null;
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
