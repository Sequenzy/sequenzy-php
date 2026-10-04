<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailCheckLinkFindingsItem extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $rule
     */
    #[JsonProperty('rule')]
    public ?string $rule;

    /**
     * @var ?value-of<EmailCheckLinkFindingsItemSeverity> $severity
     */
    #[JsonProperty('severity')]
    public ?string $severity;

    /**
     * @param array{
     *   message?: ?string,
     *   rule?: ?string,
     *   severity?: ?value-of<EmailCheckLinkFindingsItemSeverity>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->rule = $values['rule'] ?? null;
        $this->severity = $values['severity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
