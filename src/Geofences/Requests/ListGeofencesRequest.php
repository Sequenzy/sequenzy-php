<?php

namespace Sequenzy\Geofences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Geofences\Types\ListGeofencesRequestActive;

class ListGeofencesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListGeofencesRequestActive> $active true for active geofences only, false for paused ones only.
     */
    public ?string $active;

    /**
     * @var ?string $cursor nextCursor from the previous page.
     */
    public ?string $cursor;

    /**
     * @var ?string $group Only geofences in this group.
     */
    public ?string $group;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @param array{
     *   active?: ?value-of<ListGeofencesRequestActive>,
     *   cursor?: ?string,
     *   group?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->group = $values['group'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
