<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceSubscriberUpdateStepUpdateInput extends JsonSerializableType
{
    /**
     * @var SubscriberUpdateConfig $config
     */
    #[JsonProperty('config')]
    public SubscriberUpdateConfig $config;

    /**
     * @var string $nodeId Target action_update_attributes node ID.
     */
    #[JsonProperty('nodeId')]
    public string $nodeId;

    /**
     * @param array{
     *   config: SubscriberUpdateConfig,
     *   nodeId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->config = $values['config'];
        $this->nodeId = $values['nodeId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
