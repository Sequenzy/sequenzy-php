<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SavedPopupEmbed;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SavedPopup;

class CreateSavedPopupResponse extends JsonSerializableType
{
    /**
     * @var ?SavedPopupEmbed $embed
     */
    #[JsonProperty('embed')]
    public ?SavedPopupEmbed $embed;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?SavedPopup $popup
     */
    #[JsonProperty('popup')]
    public ?SavedPopup $popup;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   embed?: ?SavedPopupEmbed,
     *   message?: ?string,
     *   popup?: ?SavedPopup,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->embed = $values['embed'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->popup = $values['popup'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
