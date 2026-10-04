<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewFromExampleSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $brand Gallery brand slug. Use with `sequence` instead of `url`.
     */
    #[JsonProperty('brand')]
    public ?string $brand;

    /**
     * @var ?string $brief Optional direction for every email. Takes priority over the example.
     */
    #[JsonProperty('brief')]
    public ?string $brief;

    /**
     * @var ?string $sequence Gallery sequence slug. Use with `brand` instead of `url`.
     */
    #[JsonProperty('sequence')]
    public ?string $sequence;

    /**
     * @var ?string $url Gallery sequence page URL.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $website Optional site or domain, such as `acme.com`, to write the preview for instead of your own brand. Its registrable domain is looked up like the public gallery preview. Omit it to use your company's brand profile.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @param array{
     *   brand?: ?string,
     *   brief?: ?string,
     *   sequence?: ?string,
     *   url?: ?string,
     *   website?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->brief = $values['brief'] ?? null;
        $this->sequence = $values['sequence'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->website = $values['website'] ?? null;
    }
}
