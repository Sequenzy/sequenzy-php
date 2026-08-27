<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RenderEmailResponseEntity extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<RenderEmailResponseEntityType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $variantId
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @param array{
     *   id: string,
     *   type: value-of<RenderEmailResponseEntityType>,
     *   variantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
        $this->variantId = $values['variantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
