<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateFromExampleSequencesResponseExample extends JsonSerializableType
{
    /**
     * @var ?string $brand
     */
    #[JsonProperty('brand')]
    public ?string $brand;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $omittedEmailCount Emails in the example beyond the 12-step limit that were not cloned.
     */
    #[JsonProperty('omittedEmailCount')]
    public ?int $omittedEmailCount;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   brand?: ?string,
     *   name?: ?string,
     *   omittedEmailCount?: ?int,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->omittedEmailCount = $values['omittedEmailCount'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
