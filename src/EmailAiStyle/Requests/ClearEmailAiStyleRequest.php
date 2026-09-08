<?php

namespace Sequenzy\EmailAiStyle\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ClearEmailAiStyleRequest extends JsonSerializableType
{
    /**
     * @var string $expectedStyleId Nonempty revisionId returned by GET, including unsupported-version revisions.
     */
    #[JsonProperty('expectedStyleId')]
    public string $expectedStyleId;

    /**
     * @param array{
     *   expectedStyleId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->expectedStyleId = $values['expectedStyleId'];
    }
}
