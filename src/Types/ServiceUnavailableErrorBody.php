<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ServiceUnavailableErrorBody extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $importId
     */
    #[JsonProperty('importId')]
    public ?string $importId;

    /**
     * @var ?bool $retryable
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
     *   error?: ?string,
     *   importId?: ?string,
     *   retryable?: ?bool,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->importId = $values['importId'] ?? null;
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
