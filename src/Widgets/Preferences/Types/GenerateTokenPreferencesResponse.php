<?php

namespace Sequenzy\Widgets\Preferences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GenerateTokenPreferencesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $token Signed JWT token (valid for 1 hour)
     */
    #[JsonProperty('token')]
    public ?string $token;

    /**
     * @param array{
     *   success?: ?bool,
     *   token?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->token = $values['token'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
