<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EventSchemaProvidersItemPropertiesItem extends JsonSerializableType
{
    /**
     * @var ?string $description Present only where the sample value alone is ambiguous.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $mergeTag Merge tag that resolves this path. Scalar paths only.
     */
    #[JsonProperty('mergeTag')]
    public ?string $mergeTag;

    /**
     * @var ?string $path Dot path into the payload. Object array elements use [], e.g. lineItems[].priceCents.
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?string $type Human-readable type, e.g. string, string | null, object[].
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   description?: ?string,
     *   mergeTag?: ?string,
     *   path?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->mergeTag = $values['mergeTag'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
