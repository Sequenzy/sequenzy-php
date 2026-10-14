<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class BadRequestErrorBody extends JsonSerializableType
{
    /**
     * @var ?string $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?array<DesignMdIssue> $issues
     */
    #[JsonProperty('issues'), ArrayType([DesignMdIssue::class])]
    public ?array $issues;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   code?: ?string,
     *   error?: ?string,
     *   issues?: ?array<DesignMdIssue>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->code = $values['code'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->issues = $values['issues'] ?? null;
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
