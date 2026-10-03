<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Sequences\Types\CreateFromExampleSequencesRequestEmailStyle;

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
        $this->url = $values['url'] ?? null;
    }
}
