<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureCountdownBlock extends JsonSerializableType
{
    /**
     * @var string $endsAt
     */
    #[JsonProperty('endsAt')]
    public string $endsAt;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @param array{
     *   endsAt: string,
     *   id: string,
     *   label: string,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->endsAt = $values['endsAt'];
        $this->id = $values['id'];
        $this->label = $values['label'];
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
