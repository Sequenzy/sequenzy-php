<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SavedFormEmbed;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SavedForm;

class GetSavedFormEmbedResponse extends JsonSerializableType
{
    /**
     * @var ?SavedFormEmbed $embed
     */
    #[JsonProperty('embed')]
    public ?SavedFormEmbed $embed;

    /**
     * @var ?SavedForm $form
     */
    #[JsonProperty('form')]
    public ?SavedForm $form;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   embed?: ?SavedFormEmbed,
     *   form?: ?SavedForm,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->embed = $values['embed'] ?? null;
        $this->form = $values['form'] ?? null;
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
