<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Sequences\Types\GenerateEmailVariationsSequencesRequestStyle;

class GenerateEmailVariationsSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var string $prompt The direction for the new versions, in any language.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?value-of<GenerateEmailVariationsSequencesRequestStyle> $style How far the new versions move from the email. close edits it, keeping its style and structure; fresh writes each version anew with its own structure in the brand's colors and fonts; bold also gives each its own look. Defaults to fresh.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @param array{
     *   prompt: string,
     *   count?: ?int,
     *   style?: ?value-of<GenerateEmailVariationsSequencesRequestStyle>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'] ?? null;
        $this->prompt = $values['prompt'];
        $this->style = $values['style'] ?? null;
    }
}
