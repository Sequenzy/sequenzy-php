<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class SimulateSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $email Optional stored subscriber email to walk through the graph. Do not pass with subscriberId.
     */
    public ?string $email;

    /**
     * @var ?int $limit How many currently matching contacts to include in the sample. Defaults to 10, maximum 25.
     */
    public ?int $limit;

    /**
     * @var ?string $subscriberId Optional stored subscriber to walk through the graph. Do not pass with email.
     */
    public ?string $subscriberId;

    /**
     * @param array{
     *   email?: ?string,
     *   limit?: ?int,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
