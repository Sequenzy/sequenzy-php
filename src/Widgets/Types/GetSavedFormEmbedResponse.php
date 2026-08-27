<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetSavedFormEmbedResponse extends JsonSerializableType
{
    /**
     * @var ?GetSavedFormEmbedResponseEmbed $embed
     */
    #[JsonProperty('embed')]
    public ?GetSavedFormEmbedResponseEmbed $embed;

    /**
     * @var ?array<string, mixed> $form
     */
    #[JsonProperty('form'), ArrayType(['string' => 'mixed'])]
    public ?array $form;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   embed?: ?GetSavedFormEmbedResponseEmbed,
     *   form?: ?array<string, mixed>,
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
