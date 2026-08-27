<?php

namespace Sequenzy\Sms\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateNumberLabelSmsResponseNumber extends JsonSerializableType
{
    /**
     * @var ?string $brandPrefix
     */
    #[JsonProperty('brandPrefix')]
    public ?string $brandPrefix;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   brandPrefix?: ?string,
     *   id?: ?string,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandPrefix = $values['brandPrefix'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
