<?php

namespace Sequenzy\EmailComponents\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\EmailComponents\Types\ListEmailComponentsRequestDefaultsOnly;
use Sequenzy\EmailComponents\Types\ListEmailComponentsRequestSlot;
use Sequenzy\EmailComponents\Types\ListEmailComponentsRequestType;

class ListEmailComponentsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListEmailComponentsRequestDefaultsOnly> $defaultsOnly Return only components pinned as a company default.
     */
    public ?string $defaultsOnly;

    /**
     * @var ?value-of<ListEmailComponentsRequestSlot> $slot Filter by default slot.
     */
    public ?string $slot;

    /**
     * @var ?value-of<ListEmailComponentsRequestType> $type Filter by component type.
     */
    public ?string $type;

    /**
     * @param array{
     *   defaultsOnly?: ?value-of<ListEmailComponentsRequestDefaultsOnly>,
     *   slot?: ?value-of<ListEmailComponentsRequestSlot>,
     *   type?: ?value-of<ListEmailComponentsRequestType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->defaultsOnly = $values['defaultsOnly'] ?? null;
        $this->slot = $values['slot'] ?? null;
        $this->type = $values['type'] ?? null;
    }
}
