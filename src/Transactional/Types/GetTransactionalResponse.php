<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TransactionalEmailDetails;

class GetTransactionalResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?TransactionalEmailDetails $transactional
     */
    #[JsonProperty('transactional')]
    public ?TransactionalEmailDetails $transactional;

    /**
     * @param array{
     *   success?: ?bool,
     *   transactional?: ?TransactionalEmailDetails,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
