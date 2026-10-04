<?php

namespace Sequenzy\References\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class WatchGalleryBrandRequest extends JsonSerializableType
{
    /**
     * @var ?string $note Optional. What you want to see from the brand, such as its onboarding emails.
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var string $website The brand's website or domain, such as `competitor.com` or `https://competitor.com/pricing`. It is reduced to the registrable domain. It cannot be your own website.
     */
    #[JsonProperty('website')]
    public string $website;

    /**
     * @param array{
     *   website: string,
     *   note?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->note = $values['note'] ?? null;
        $this->website = $values['website'];
    }
}
