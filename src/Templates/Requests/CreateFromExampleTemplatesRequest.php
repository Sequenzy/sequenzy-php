<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateFromExampleTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?string $brand Gallery brand slug. Use with `email` instead of `url`.
     */
    #[JsonProperty('brand')]
    public ?string $brand;

    /**
     * @var ?string $brief Optional direction for the new email. Takes priority over the example.
     */
    #[JsonProperty('brief')]
    public ?string $brief;

    /**
     * @var ?string $email Gallery email slug. Use with `brand` instead of `url`.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $name Template name. Defaults to the generated subject followed by "(remix of {brand})".
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $url Gallery email page URL, such as `https://sequenzy.com/email-examples/brands/linear/emails/welcome-to-linear`.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   brand?: ?string,
     *   brief?: ?string,
     *   email?: ?string,
     *   name?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->brief = $values['brief'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
