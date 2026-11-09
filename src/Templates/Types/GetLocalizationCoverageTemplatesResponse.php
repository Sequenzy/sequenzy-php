<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetLocalizationCoverageTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?array<GetLocalizationCoverageTemplatesResponseLocalesItem> $locales One entry per enabled non-primary locale. Empty when only the primary language is configured.
     */
    #[JsonProperty('locales'), ArrayType([GetLocalizationCoverageTemplatesResponseLocalesItem::class])]
    public ?array $locales;

    /**
     * @var ?string $primaryLocale Locale the emails are written in.
     */
    #[JsonProperty('primaryLocale')]
    public ?string $primaryLocale;

    /**
     * @var ?GetLocalizationCoverageTemplatesResponsePush $push Push steps in sequences that are not archived or defined in code. A failed push translation counts as missing again, so there is no failed count.
     */
    #[JsonProperty('push')]
    public ?GetLocalizationCoverageTemplatesResponsePush $push;

    /**
     * @var ?int $sequenceEmails Sequence email steps and sequence A/B variants counted.
     */
    #[JsonProperty('sequenceEmails')]
    public ?int $sequenceEmails;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $totalEmails Sequence and transactional emails counted.
     */
    #[JsonProperty('totalEmails')]
    public ?int $totalEmails;

    /**
     * @var ?int $transactionalEmails Enabled transactional emails counted. An email used by both a sequence and a transactional email counts once, as a sequence email.
     */
    #[JsonProperty('transactionalEmails')]
    public ?int $transactionalEmails;

    /**
     * @param array{
     *   locales?: ?array<GetLocalizationCoverageTemplatesResponseLocalesItem>,
     *   primaryLocale?: ?string,
     *   push?: ?GetLocalizationCoverageTemplatesResponsePush,
     *   sequenceEmails?: ?int,
     *   success?: ?bool,
     *   totalEmails?: ?int,
     *   transactionalEmails?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
        $this->primaryLocale = $values['primaryLocale'] ?? null;
        $this->push = $values['push'] ?? null;
        $this->sequenceEmails = $values['sequenceEmails'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->totalEmails = $values['totalEmails'] ?? null;
        $this->transactionalEmails = $values['transactionalEmails'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
