<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushDeviceCountsActive extends JsonSerializableType
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
     * @var ?int $web
     */
    #[JsonProperty('web')]
    public ?int $web;

    /**
     * @param array{
     *   android?: ?int,
     *   ios?: ?int,
     *   web?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->android = $values['android'] ?? null;
        $this->ios = $values['ios'] ?? null;
        $this->web = $values['web'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
