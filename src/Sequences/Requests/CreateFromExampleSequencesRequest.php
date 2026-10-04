<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Sequences\Types\CreateFromExampleSequencesRequestEmailStyle;
use Sequenzy\Core\Types\ArrayType;

class CreateFromExampleSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $brand Gallery brand slug. Use with `sequence` instead of `url`.
     */
    #[JsonProperty('brand')]
    public ?string $brand;

    /**
     * @var ?string $brief Optional direction applied to every email. Takes priority over the example.
     */
    #[JsonProperty('brief')]
    public ?string $brief;

    /**
     * @var ?value-of<CreateFromExampleSequencesRequestEmailStyle> $emailStyle Generated email style. Defaults to the company's email style preference.
     */
    #[JsonProperty('emailStyle')]
    public ?string $emailStyle;

    /**
     * @var ?string $name Sequence name. Defaults to the sequence type, such as "Onboarding sequence".
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $sequence Gallery sequence slug. Use with `brand` instead of `url`.
     */
    #[JsonProperty('sequence')]
    public ?string $sequence;

    /**
     * @var ?array<int> $stepNumbers Which of the example's emails to clone, as 1-based positions in the gallery sequence (its Email 1, Email 2 and so on), not the `stepNumber` of the created sequence's steps. Duplicates are ignored and order does not matter. Each email keeps its original timing from the trigger. Defaults to the first 12. An empty list, more than 12 distinct positions, or a position outside the sequence returns 400; a list of more than 100 entries or non-integer entries fails validation with 422.
     */
    #[JsonProperty('stepNumbers'), ArrayType(['integer'])]
    public ?array $stepNumbers;

    /**
     * @var ?string $url Gallery sequence page URL, such as `https://sequenzy.com/email-examples/brands/linear/sequences/onboarding`.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   brand?: ?string,
     *   brief?: ?string,
     *   emailStyle?: ?value-of<CreateFromExampleSequencesRequestEmailStyle>,
     *   name?: ?string,
     *   sequence?: ?string,
     *   stepNumbers?: ?array<int>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->brief = $values['brief'] ?? null;
        $this->emailStyle = $values['emailStyle'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->sequence = $values['sequence'] ?? null;
        $this->stepNumbers = $values['stepNumbers'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
