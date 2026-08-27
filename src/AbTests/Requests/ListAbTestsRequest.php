<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?string $sequenceId Optional sequence ID filter for automation A/B tests.
     */
    public ?string $sequenceId;

    /**
     * @param array{
     *   sequenceId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sequenceId = $values['sequenceId'] ?? null;
    }
}
