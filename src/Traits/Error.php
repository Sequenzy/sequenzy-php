<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\InputIssue;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property ?string $code
 * @property string $error
 * @property ?array<InputIssue> $issues
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
     * @var ?array<InputIssue> $issues Field-level problems with the request, when the endpoint reports them. Up to ten entries; `error` summarizes the first three.
     */
    #[JsonProperty('issues'), ArrayType([InputIssue::class])]
    public ?array $issues;

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
