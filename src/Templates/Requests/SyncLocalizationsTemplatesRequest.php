<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SyncLocalizationsTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $locales Enabled non-primary locale codes to sync. Omit to sync all of them.
     */
    #[JsonProperty('locales'), ArrayType(['string'])]
    public ?array $locales;

    /**
     * @var ?bool $skipEdited Keep translations someone edited instead of retranslating them. Kept locales are returned in skippedLocales.
     */
    #[JsonProperty('skipEdited')]
    public ?bool $skipEdited;

    /**
     * @param array{
     *   locales?: ?array<string>,
     *   skipEdited?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
        $this->skipEdited = $values['skipEdited'] ?? null;
    }
}
