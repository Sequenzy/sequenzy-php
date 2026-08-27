<?php

namespace Sequenzy\Widgets\Preferences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GenerateTokenPreferencesRequest extends JsonSerializableType
{
    /**
     * @var string $email The subscriber's email address
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @param array{
     *   email: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
    }
}
