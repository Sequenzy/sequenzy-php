<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TranslateMissingLocalizationsTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $locales Enabled non-primary locale codes to translate into. Omit to translate into all of them.
     */
    #[JsonProperty('locales'), ArrayType(['string'])]
    public ?array $locales;

    /**
     * @param array{
     *   locales?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
    }
}
