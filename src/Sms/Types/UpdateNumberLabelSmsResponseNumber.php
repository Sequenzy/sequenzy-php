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
     * @var ?bool $linkShorteningEnabled
     */
    #[JsonProperty('linkShorteningEnabled')]
    public ?bool $linkShorteningEnabled;

    /**
     * @param array{
     *   brandPrefix?: ?string,
     *   id?: ?string,
     *   label?: ?string,
     *   linkShorteningEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandPrefix = $values['brandPrefix'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->linkShorteningEnabled = $values['linkShorteningEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
