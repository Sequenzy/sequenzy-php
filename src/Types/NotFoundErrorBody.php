<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class NotFoundErrorBody extends JsonSerializableType
{
    /**
     * @var ?NotFoundErrorBodyError $error
     */
    #[JsonProperty('error')]
    public ?NotFoundErrorBodyError $error;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   error?: ?NotFoundErrorBodyError,
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
