<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequencePathStepConfigOutputFieldsItem extends JsonSerializableType
{
    /**
     * @var ?string $description What the model should produce for this field. Max 300 characters.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $fallback Text used verbatim when generation fails or the model omits the field.
     */
    #[JsonProperty('fallback')]
    public ?string $fallback;

    /**
     * @var string $key Field key, e.g. subject_line. Must start with a letter and use only letters, numbers, or underscores (max 64 chars); unique within the step.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?int $maxLength Hard cap on stored characters (1-4000). Defaults to 500. Output beyond it is cut.
     */
    #[JsonProperty('maxLength')]
    public ?int $maxLength;

    /**
     * @param array{
     *   key: string,
     *   description?: ?string,
     *   fallback?: ?string,
     *   maxLength?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'] ?? null;
        $this->fallback = $values['fallback'] ?? null;
        $this->key = $values['key'];
        $this->maxLength = $values['maxLength'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
