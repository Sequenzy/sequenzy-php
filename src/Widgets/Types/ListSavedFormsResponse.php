<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SavedForm;
use Sequenzy\Core\Types\ArrayType;

class ListSavedFormsResponse extends JsonSerializableType
{
    /**
     * @var string $companyId
     */
    #[JsonProperty('companyId')]
    public string $companyId;

    /**
     * @var array<SavedForm> $forms
     */
    #[JsonProperty('forms'), ArrayType([SavedForm::class])]
    public array $forms;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?string $url Forms dashboard URL.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   companyId: string,
     *   forms: array<SavedForm>,
     *   success: bool,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->forms = $values['forms'];
        $this->success = $values['success'];
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
