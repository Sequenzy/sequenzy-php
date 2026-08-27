<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class DeleteVariantAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $confirmLiveChange Required as true when the A/B test belongs to an active sequence, because deletion immediately changes the live rotation.
     */
    public ?bool $confirmLiveChange;

    /**
     * @param array{
     *   confirmLiveChange?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
    }
}
