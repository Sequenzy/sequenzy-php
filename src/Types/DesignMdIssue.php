<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DesignMdIssue extends JsonSerializableType
{
    /**
     * @var ?int $line 1-based line in the document, when the issue maps to one.
     */
    #[JsonProperty('line')]
    public ?int $line;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   message: string,
     *   line?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->line = $values['line'] ?? null;
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
