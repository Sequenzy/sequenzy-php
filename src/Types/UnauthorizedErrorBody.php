<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UnauthorizedErrorBody extends JsonSerializableType
{
    /**
     * @var ?UnauthorizedErrorBodyError $error
     */
    #[JsonProperty('error')]
    public ?UnauthorizedErrorBodyError $error;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   error?: ?UnauthorizedErrorBodyError,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
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
