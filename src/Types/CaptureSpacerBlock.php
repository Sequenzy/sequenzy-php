<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureSpacerBlock extends JsonSerializableType
{
    /**
     * @var int $height
     */
    #[JsonProperty('height')]
    public int $height;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @param array{
     *   height: int,
     *   id: string,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->height = $values['height'];
        $this->id = $values['id'];
        $this->sectionId = $values['sectionId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
