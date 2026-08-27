<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SavedPopup;
use Sequenzy\Core\Types\ArrayType;

class ListSavedPopupsResponse extends JsonSerializableType
{
    /**
     * @var string $companyId
     */
    #[JsonProperty('companyId')]
    public string $companyId;

    /**
     * @var ?string $note Present when content blocks were omitted, explaining how to fetch them.
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var array<SavedPopup> $popups
     */
    #[JsonProperty('popups'), ArrayType([SavedPopup::class])]
    public array $popups;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   companyId: string,
     *   popups: array<SavedPopup>,
     *   success: bool,
     *   note?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->note = $values['note'] ?? null;
        $this->popups = $values['popups'];
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
