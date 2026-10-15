<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EditVariationCampaignsRequest extends JsonSerializableType
{
    /**
     * @var string $prompt What should change, in any language.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?array<string> $sectionIds Only change these top-level blocks. Omit to change the whole variation.
     */
    #[JsonProperty('sectionIds'), ArrayType(['string'])]
    public ?array $sectionIds;

    /**
     * @param array{
     *   prompt: string,
     *   sectionIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->prompt = $values['prompt'];
        $this->sectionIds = $values['sectionIds'] ?? null;
    }
}
