<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\PushImportWarning;
use Sequenzy\Core\Types\ArrayType;

class GetPushImportPreflightResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<PushImportWarning> $warnings
     */
    #[JsonProperty('warnings'), ArrayType([PushImportWarning::class])]
    public ?array $warnings;

    /**
     * @param array{
     *   success?: ?bool,
     *   warnings?: ?array<PushImportWarning>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
