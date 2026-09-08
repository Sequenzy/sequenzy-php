<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageTestimonial extends JsonSerializableType
{
    /**
     * @var ?string $avatarUrl
     */
    #[JsonProperty('avatarUrl')]
    public ?string $avatarUrl;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $quote
     */
    #[JsonProperty('quote')]
    public string $quote;

    /**
     * @var ?string $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @param array{
     *   name: string,
     *   quote: string,
     *   avatarUrl?: ?string,
     *   role?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->avatarUrl = $values['avatarUrl'] ?? null;
        $this->name = $values['name'];
        $this->quote = $values['quote'];
        $this->role = $values['role'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
