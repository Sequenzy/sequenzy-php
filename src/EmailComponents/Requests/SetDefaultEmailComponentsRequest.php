<?php

namespace Sequenzy\EmailComponents\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SetDefaultEmailComponentsRequest extends JsonSerializableType
{
    /**
     * @var array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public array $blocks;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $name Defaults to "Default Footer" when creating the footer default.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   blocks: array<EmailBlock>,
     *   description?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'];
        $this->description = $values['description'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
