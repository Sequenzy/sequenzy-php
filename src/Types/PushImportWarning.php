<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushImportWarning extends JsonSerializableType
{
    /**
     * @var ?value-of<PushImportWarningCode> $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?value-of<PushImportWarningSeverity> $severity
     */
    #[JsonProperty('severity')]
    public ?string $severity;

    /**
     * @param array{
     *   code?: ?value-of<PushImportWarningCode>,
     *   message?: ?string,
     *   severity?: ?value-of<PushImportWarningSeverity>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->code = $values['code'] ?? null;
        $this->message = $values['message'] ?? null;
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
