<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewFromExampleTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?string $brand Gallery brand slug. Use with `email` instead of `url`.
     */
    #[JsonProperty('brand')]
    public ?string $brand;

    /**
     * @var ?string $brief Optional direction for the email. Takes priority over the example.
     */
    #[JsonProperty('brief')]
    public ?string $brief;

    /**
     * @var ?string $email Gallery email slug. Use with `brand` instead of `url`.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $url Gallery email page URL, or a sequence page URL ending in `#email-{email}`.
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
     *   email?: ?string,
     *   url?: ?string,
     *   website?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->brief = $values['brief'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->website = $values['website'] ?? null;
    }
}
