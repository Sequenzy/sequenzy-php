<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class Error extends JsonSerializableType
{
    /**
     * @var ?string $code Optional stable machine-readable error discriminator when available.
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var string $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var ?bool $retryable Whether retrying the request can recover from the error.
     */
    #[JsonProperty('retryable')]
    public ?bool $retryable;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   error: string,
     *   code?: ?string,
     *   retryable?: ?bool,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'] ?? null;
        $this->error = $values['error'];
        $this->retryable = $values['retryable'] ?? null;
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
