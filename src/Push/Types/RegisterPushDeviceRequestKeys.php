<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Web only. PushSubscription.toJSON().keys.
 */
class RegisterPushDeviceRequestKeys extends JsonSerializableType
{
    /**
     * @var ?string $auth
     */
    #[JsonProperty('auth')]
    public ?string $auth;

    /**
     * @var ?string $p256Dh
     */
    #[JsonProperty('p256dh')]
    public ?string $p256Dh;

    /**
     * @param array{
     *   auth?: ?string,
     *   p256Dh?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->auth = $values['auth'] ?? null;
        $this->p256Dh = $values['p256Dh'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
