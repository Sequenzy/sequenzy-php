<?php

namespace Sequenzy\EmailBlocks\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\EmailBlocks\Types\ListEmailBlocksRequestCreatableOnly;

class ListEmailBlocksRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListEmailBlocksRequestCreatableOnly> $creatableOnly Hide structural block types the editor manages for you.
     */
    public ?string $creatableOnly;

    /**
     * @param array{
     *   creatableOnly?: ?value-of<ListEmailBlocksRequestCreatableOnly>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->creatableOnly = $values['creatableOnly'] ?? null;
    }
}
