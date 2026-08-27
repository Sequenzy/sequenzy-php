<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListIntegrationsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $includeInactive Include disconnected integrations. Defaults to false.
     */
    public ?bool $includeInactive;

    /**
     * @param array{
     *   includeInactive?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeInactive = $values['includeInactive'] ?? null;
    }
}
