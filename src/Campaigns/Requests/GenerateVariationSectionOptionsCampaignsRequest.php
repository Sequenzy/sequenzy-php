<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Campaigns\Types\GenerateVariationSectionOptionsCampaignsRequestStyle;

class GenerateVariationSectionOptionsCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var string $prompt
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var array<string> $sectionIds Ids of top-level blocks to vary.
     */
    #[JsonProperty('sectionIds'), ArrayType(['string'])]
    public array $sectionIds;

    /**
     * @var ?value-of<GenerateVariationSectionOptionsCampaignsRequestStyle> $style How far the options move from the selected sections. close stays near them; fresh and bold try clearly different takes. Defaults to fresh.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?string $variationId Vary this variation's sections. Omit to vary the email's saved content.
     */
    #[JsonProperty('variationId')]
    public ?string $variationId;

    /**
     * @param array{
     *   prompt: string,
     *   sectionIds: array<string>,
     *   count?: ?int,
     *   style?: ?value-of<GenerateVariationSectionOptionsCampaignsRequestStyle>,
     *   variationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'] ?? null;
        $this->prompt = $values['prompt'];
        $this->sectionIds = $values['sectionIds'];
        $this->style = $values['style'] ?? null;
        $this->variationId = $values['variationId'] ?? null;
    }
}
