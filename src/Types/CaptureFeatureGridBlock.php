<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CaptureFeatureGridBlock extends JsonSerializableType
{
    /**
     * @var int $columns
     */
    #[JsonProperty('columns')]
    public int $columns;

    /**
     * @var array<CaptureFeature> $features
     */
    #[JsonProperty('features'), ArrayType([CaptureFeature::class])]
    public array $features;

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
     *   columns: int,
     *   features: array<CaptureFeature>,
     *   id: string,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->columns = $values['columns'];
        $this->features = $values['features'];
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
