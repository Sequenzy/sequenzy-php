<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Campaigns\Types\GenerateVariationsCampaignsRequestStyle;

class GenerateVariationsCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?string $parentVariationId Derive from this variation instead of the email. New variations are its branches.
     */
    #[JsonProperty('parentVariationId')]
    public ?string $parentVariationId;

    /**
     * @var string $prompt The direction for the new versions, in any language.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?value-of<GenerateVariationsCampaignsRequestStyle> $style How far the new versions move from the source. close edits it, keeping its style and structure; fresh writes each version anew with its own structure in the brand's colors and fonts; bold also gives each its own look (a theme of its own). Defaults to close for branches of a variation and fresh otherwise.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @param array{
     *   prompt: string,
     *   count?: ?int,
     *   parentVariationId?: ?string,
     *   style?: ?value-of<GenerateVariationsCampaignsRequestStyle>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'] ?? null;
        $this->parentVariationId = $values['parentVariationId'] ?? null;
        $this->prompt = $values['prompt'];
        $this->style = $values['style'] ?? null;
    }
}
