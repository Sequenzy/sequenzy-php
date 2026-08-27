<?php

namespace Sequenzy\EmailComponents\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\EmailComponents\Types\UpdateEmailComponentsRequestComponentType;

class UpdateEmailComponentsRequest extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?value-of<UpdateEmailComponentsRequestComponentType> $componentType
     */
    #[JsonProperty('componentType')]
    public ?string $componentType;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   blocks?: ?array<EmailBlock>,
     *   componentType?: ?value-of<UpdateEmailComponentsRequestComponentType>,
     *   description?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->componentType = $values['componentType'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
