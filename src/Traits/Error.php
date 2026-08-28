<?php

namespace Sequenzy\Traits;

use Sequenzy\Core\Json\JsonProperty;

/**
 * @property ?string $code
 * @property string $error
 * @property ?bool $retryable
 * @property ?bool $success
 */
trait Error
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
}
