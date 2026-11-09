<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppPlacementInput;

class UpdateInAppPlacementRequest extends JsonSerializableType
{
    /**
     * @var InAppPlacementInput $body
     */
    public InAppPlacementInput $body;

    /**
     * @param array{
     *   body: InAppPlacementInput,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
