<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\PushDevice;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListPushDevicesResponse extends JsonSerializableType
{
    /**
     * @var ?array<PushDevice> $devices
     */
    #[JsonProperty('devices'), ArrayType([PushDevice::class])]
    public ?array $devices;

    /**
     * @var ?string $nextCursor Pass as cursor to fetch the next page; null on the last page.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   devices?: ?array<PushDevice>,
     *   nextCursor?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->devices = $values['devices'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
