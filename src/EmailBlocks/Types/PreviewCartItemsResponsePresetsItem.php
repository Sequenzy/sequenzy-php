<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewCartItemsResponsePresetsItem extends JsonSerializableType
{
    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

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
     * @var PreviewCartItemsResponsePresetsItemSettings $settings
     */
    #[JsonProperty('settings')]
    public PreviewCartItemsResponsePresetsItemSettings $settings;

    /**
     * @param array{
     *   description: string,
     *   id: string,
     *   label: string,
     *   settings: PreviewCartItemsResponsePresetsItemSettings,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'];
        $this->id = $values['id'];
        $this->label = $values['label'];
        $this->settings = $values['settings'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
