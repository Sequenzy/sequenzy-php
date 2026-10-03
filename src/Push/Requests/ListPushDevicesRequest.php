<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Push\Types\ListPushDevicesRequestPlatform;
use Sequenzy\Push\Types\ListPushDevicesRequestStatus;

class ListPushDevicesRequest extends JsonSerializableType
{
    /**
     * @var ?string $cursor nextCursor from the previous page.
     */
    public ?string $cursor;

    /**
     * @var ?string $email Only this contact's devices.
     */
    public ?string $email;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?value-of<ListPushDevicesRequestPlatform> $platform
     */
    public ?string $platform;

    /**
     * @var ?value-of<ListPushDevicesRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?string $subscriberId Only this subscriber's devices.
     */
    public ?string $subscriberId;

    /**
     * @param array{
     *   cursor?: ?string,
     *   email?: ?string,
     *   limit?: ?int,
     *   platform?: ?value-of<ListPushDevicesRequestPlatform>,
     *   status?: ?value-of<ListPushDevicesRequestStatus>,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->platform = $values['platform'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
