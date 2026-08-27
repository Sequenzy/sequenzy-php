<?php

namespace Sequenzy\EmailBlocks\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\EmailBlocks\Types\GetEmailBlocksRequestConditionFields;

class GetEmailBlocksRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetEmailBlocksRequestConditionFields> $conditionFields Include the per-field condition table in the response. Not needed for `conditional-group`, which always carries it. The table is several times the size of one block type's reference, so a targeted lookup does not carry it unless asked.
     */
    public ?string $conditionFields;

    /**
     * @param array{
     *   conditionFields?: ?value-of<GetEmailBlocksRequestConditionFields>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conditionFields = $values['conditionFields'] ?? null;
    }
}
