<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalSendDiagnosticsMissingRequiredVariablesItemUsedInItem extends JsonSerializableType
{
    /**
     * @var ?string $blockId
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var ?string $blockType
     */
    #[JsonProperty('blockType')]
    public ?string $blockType;

    /**
     * @var ?string $field
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<TransactionalSendDiagnosticsMissingRequiredVariablesItemUsedInItemSurface> $surface
     */
    #[JsonProperty('surface')]
    public ?string $surface;

    /**
     * @param array{
     *   blockId?: ?string,
     *   blockType?: ?string,
     *   field?: ?string,
     *   surface?: ?value-of<TransactionalSendDiagnosticsMissingRequiredVariablesItemUsedInItemSurface>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->blockType = $values['blockType'] ?? null;
        $this->field = $values['field'] ?? null;
        $this->surface = $values['surface'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
