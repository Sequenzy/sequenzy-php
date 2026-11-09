<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class GetInAppPlacementContentRequest extends JsonSerializableType
{
    /**
     * @var ?string $actions Comma-separated button actions your app handles beyond open_url and dismiss (request_push_permission). Items with other actions are skipped, so a lower-priority item can show.
     */
    public ?string $actions;

    /**
     * @var ?string $email
     */
    public ?string $email;

    /**
     * @var ?string $externalId
     */
    public ?string $externalId;

    /**
     * @var string $placements Comma-separated placement keys, up to 10.
     */
    public string $placements;

    /**
     * @var ?string $subscriberId
     */
    public ?string $subscriberId;

    /**
     * @param array{
     *   placements: string,
     *   actions?: ?string,
     *   email?: ?string,
     *   externalId?: ?string,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->actions = $values['actions'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->placements = $values['placements'];
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
