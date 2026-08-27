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
