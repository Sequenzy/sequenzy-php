<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Readable format only, and required there. Use one of event (with optional where property filters), tag, list, segment, manual: true, or type and config.
 */
class SequenceDefinitionTrigger extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $config
     */
    #[JsonProperty('config'), ArrayType(['string' => 'mixed'])]
    public ?array $config;

    /**
     * @var ?string $event
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?string $key Defaults to trigger.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $list
     */
    #[JsonProperty('list')]
    public ?string $list;

    /**
     * @var ?bool $manual
     */
    #[JsonProperty('manual')]
    public ?bool $manual;

    /**
     * @var ?string $segment
     */
    #[JsonProperty('segment')]
    public ?string $segment;

    /**
     * @var ?string $tag
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<array<string, mixed>> $where
     */
    #[JsonProperty('where'), ArrayType([['string' => 'mixed']])]
    public ?array $where;

    /**
     * @param array{
     *   config?: ?array<string, mixed>,
     *   event?: ?string,
     *   key?: ?string,
     *   label?: ?string,
     *   list?: ?string,
     *   manual?: ?bool,
     *   segment?: ?string,
     *   tag?: ?string,
     *   type?: ?string,
     *   where?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->config = $values['config'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->list = $values['list'] ?? null;
        $this->manual = $values['manual'] ?? null;
        $this->segment = $values['segment'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->where = $values['where'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
