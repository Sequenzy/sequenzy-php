<?php

namespace Sequenzy\References\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ListEmailReferencesResponseSequencesItem extends JsonSerializableType
{
    /**
     * @var ?ListEmailReferencesResponseSequencesItemBrand $brand
     */
    #[JsonProperty('brand')]
    public ?ListEmailReferencesResponseSequencesItemBrand $brand;

    /**
     * @var ?int $emailCount
     */
    #[JsonProperty('emailCount')]
    public ?int $emailCount;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   brand?: ?ListEmailReferencesResponseSequencesItemBrand,
     *   emailCount?: ?int,
     *   id?: ?string,
     *   name?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
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
