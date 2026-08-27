<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentMoveResponseEnqueueErrorsItem extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $tokenId
     */
    #[JsonProperty('tokenId')]
    public ?string $tokenId;

    /**
     * @param array{
     *   error?: ?string,
     *   tokenId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->tokenId = $values['tokenId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
