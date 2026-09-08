<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureImageBlock extends JsonSerializableType
{
    /**
     * @var string $alt
     */
    #[JsonProperty('alt')]
    public string $alt;

    /**
     * @var value-of<CaptureImageBlockFit> $fit
     */
    #[JsonProperty('fit')]
    public string $fit;

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
     * @var string $src
     */
    #[JsonProperty('src')]
    public string $src;

    /**
     * @param array{
     *   alt: string,
     *   fit: value-of<CaptureImageBlockFit>,
     *   id: string,
     *   src: string,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->alt = $values['alt'];
        $this->fit = $values['fit'];
        $this->id = $values['id'];
        $this->sectionId = $values['sectionId'] ?? null;
        $this->src = $values['src'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
