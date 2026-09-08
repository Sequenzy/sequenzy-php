<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureTestimonial extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $quote Inline HTML is sanitized. Visible text after stripping markup and trimming must contain 1 to 500 characters. maxLength limits the raw markup separately.
     */
    #[JsonProperty('quote')]
    public string $quote;

    /**
     * @var string $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @param array{
     *   name: string,
     *   quote: string,
     *   role: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->quote = $values['quote'];
        $this->role = $values['role'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
