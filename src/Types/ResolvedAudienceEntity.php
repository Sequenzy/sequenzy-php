<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ResolvedAudienceEntity extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $missing True when the ID points at a deleted or cross-company record.
     */
    #[JsonProperty('missing')]
    public ?bool $missing;

    /**
     * @var ?string $name Null when the referenced list or segment no longer exists.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   id?: ?string,
     *   missing?: ?bool,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->missing = $values['missing'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
