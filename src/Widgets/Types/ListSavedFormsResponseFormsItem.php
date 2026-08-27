<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListSavedFormsResponseFormsItem extends JsonSerializableType
{
    /**
     * @var ?string $actionUrl
     */
    #[JsonProperty('actionUrl')]
    public ?string $actionUrl;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string, mixed> $settings
     */
    #[JsonProperty('settings'), ArrayType(['string' => 'mixed'])]
    public ?array $settings;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   actionUrl?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   settings?: ?array<string, mixed>,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->actionUrl = $values['actionUrl'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
