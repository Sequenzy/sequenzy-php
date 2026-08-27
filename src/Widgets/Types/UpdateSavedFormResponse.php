<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateSavedFormResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $embed Embed recipes, present when the form is published.
     */
    #[JsonProperty('embed'), ArrayType(['string' => 'mixed'])]
    public ?array $embed;

    /**
     * @var ?array<string, mixed> $form
     */
    #[JsonProperty('form'), ArrayType(['string' => 'mixed'])]
    public ?array $form;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   embed?: ?array<string, mixed>,
     *   form?: ?array<string, mixed>,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->embed = $values['embed'] ?? null;
        $this->form = $values['form'] ?? null;
        $this->message = $values['message'] ?? null;
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
