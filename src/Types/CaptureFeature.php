<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * At least one of title or description must contain visible text.
 */
class CaptureFeature extends JsonSerializableType
{
    /**
     * @var string $description Inline HTML is sanitized. Visible text after stripping markup and trimming must contain at most 300 characters. maxLength limits the raw markup separately.
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $title Inline HTML is sanitized. Visible text after stripping markup and trimming must contain at most 120 characters. maxLength limits the raw markup separately.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @param array{
     *   description: string,
     *   title: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'];
        $this->title = $values['title'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
