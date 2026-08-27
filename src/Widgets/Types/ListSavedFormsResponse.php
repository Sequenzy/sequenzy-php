<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListSavedFormsResponse extends JsonSerializableType
{
    /**
     * @var string $companyId
     */
    #[JsonProperty('companyId')]
    public string $companyId;

    /**
     * @var array<ListSavedFormsResponseFormsItem> $forms
     */
    #[JsonProperty('forms'), ArrayType([ListSavedFormsResponseFormsItem::class])]
    public array $forms;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   companyId: string,
     *   forms: array<ListSavedFormsResponseFormsItem>,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->forms = $values['forms'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
