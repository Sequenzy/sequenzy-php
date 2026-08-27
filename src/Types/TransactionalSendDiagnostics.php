<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Non-blocking warnings about template variable issues. The send is still queued when this object is present, and missing values without defaults render as empty strings.
 */
class TransactionalSendDiagnostics extends JsonSerializableType
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var array<TransactionalSendDiagnosticsMissingRequiredVariablesItem> $missingRequiredVariables
     */
    #[JsonProperty('missingRequiredVariables'), ArrayType([TransactionalSendDiagnosticsMissingRequiredVariablesItem::class])]
    public array $missingRequiredVariables;

    /**
     * @var value-of<TransactionalSendDiagnosticsStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var array<TransactionalSendDiagnosticsUnusedVariablesItem> $unusedVariables
     */
    #[JsonProperty('unusedVariables'), ArrayType([TransactionalSendDiagnosticsUnusedVariablesItem::class])]
    public array $unusedVariables;

    /**
     * @param array{
     *   message: string,
     *   missingRequiredVariables: array<TransactionalSendDiagnosticsMissingRequiredVariablesItem>,
     *   status: value-of<TransactionalSendDiagnosticsStatus>,
     *   unusedVariables: array<TransactionalSendDiagnosticsUnusedVariablesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->missingRequiredVariables = $values['missingRequiredVariables'];
        $this->status = $values['status'];
        $this->unusedVariables = $values['unusedVariables'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
