<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * tokenCount per platform. iOS tokens go through APNs and Android Live Update tokens through FCM; a platform without push credentials gets nothing.
 */
class LiveActivityDispatchPlatforms extends JsonSerializableType
{
    /**
     * @var ?int $android
     */
    #[JsonProperty('android')]
    public ?int $android;

    /**
     * @var ?int $ios
     */
    #[JsonProperty('ios')]
    public ?int $ios;

    /**
     * @param array{
     *   android?: ?int,
     *   ios?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->android = $values['android'] ?? null;
        $this->ios = $values['ios'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
