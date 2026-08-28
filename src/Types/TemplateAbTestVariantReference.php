<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TemplateAbTestVariantReference extends JsonSerializableType
{
    /**
     * @var string $variantId
     */
    #[JsonProperty('variantId')]
    public string $variantId;

    /**
     * @var string $variantLabel
     */
    #[JsonProperty('variantLabel')]
    public string $variantLabel;

    /**
     * @param array{
     *   variantId: string,
     *   variantLabel: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->variantId = $values['variantId'];
        $this->variantLabel = $values['variantLabel'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
