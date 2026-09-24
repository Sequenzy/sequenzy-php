<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Returned with status 422 when the request does not match the endpoint's field types, for example a missing required field, a value outside an allowed set, or a number sent as a string. Fix the field named in `property` and retry.
 */
class RequestValidationError extends JsonSerializableType
{
    /**
     * @var ?array<RequestValidationErrorErrorsItem> $errors The first failures found, at most 10.
     */
    #[JsonProperty('errors'), ArrayType([RequestValidationErrorErrorsItem::class])]
    public ?array $errors;

    /**
     * @var mixed $found The request part as received, after unknown fields were removed.
     */
    #[JsonProperty('found')]
    public mixed $found;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $on Request part that failed, such as `body` or `query`. A query parameter outside its numeric range reports `property` here, with `property` set to `root` and the parameter value in `found`.
     */
    #[JsonProperty('on')]
    public ?string $on;

    /**
     * @var ?string $property JSON Pointer to the first failing field.
     */
    #[JsonProperty('property')]
    public ?string $property;

    /**
     * @var ?string $summary Readable description of the first failure.
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   errors?: ?array<RequestValidationErrorErrorsItem>,
     *   found?: mixed,
     *   message?: ?string,
     *   on?: ?string,
     *   property?: ?string,
     *   summary?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->found = $values['found'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->on = $values['on'] ?? null;
        $this->property = $values['property'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
