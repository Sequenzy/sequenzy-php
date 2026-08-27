<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Integrations\Types\ListActivityIntegrationsRequestStatus;

class ListActivityIntegrationsRequest extends JsonSerializableType
{
    /**
     * @var ?string $integrationId Only show activity for this integration.
     */
    public ?string $integrationId;

    /**
     * @var ?int $limit Rows to return, 1-100. Defaults to 25.
     */
    public ?int $limit;

    /**
     * @var ?string $provider Only show activity for this provider.
     */
    public ?string $provider;

    /**
     * @var ?value-of<ListActivityIntegrationsRequestStatus> $status Filter by activity status.
     */
    public ?string $status;

    /**
     * @param array{
     *   integrationId?: ?string,
     *   limit?: ?int,
     *   provider?: ?string,
     *   status?: ?value-of<ListActivityIntegrationsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->integrationId = $values['integrationId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
