<?php

namespace Sequenzy\SenderProfiles\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateReplyProfileRequest extends JsonSerializableType
{
    /**
     * @var string $name New display name. Trimmed before saving.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
    }
}
