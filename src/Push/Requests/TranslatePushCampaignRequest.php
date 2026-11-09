<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TranslatePushCampaignRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $locales Languages to translate into. Omit for every workspace language except the main one. Languages outside the workspace's list are rejected.
     */
    #[JsonProperty('locales'), ArrayType(['string'])]
    public ?array $locales;

    /**
     * @var ?bool $overwrite Retranslate every requested language, replacing versions a person wrote.
     */
    #[JsonProperty('overwrite')]
    public ?bool $overwrite;

    /**
     * @param array{
     *   locales?: ?array<string>,
     *   overwrite?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
        $this->overwrite = $values['overwrite'] ?? null;
    }
}
