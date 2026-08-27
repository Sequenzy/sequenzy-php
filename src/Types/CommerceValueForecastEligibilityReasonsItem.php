<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CommerceValueForecastEligibilityReasonsItem extends JsonSerializableType
{
    /**
     * @var ?string $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?float $current
     */
    #[JsonProperty('current')]
    public ?float $current;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?float $required
     */
    #[JsonProperty('required')]
    public ?float $required;

    /**
     * @param array{
     *   code?: ?string,
     *   current?: ?float,
     *   message?: ?string,
     *   required?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->code = $values['code'] ?? null;
        $this->current = $values['current'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->required = $values['required'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
