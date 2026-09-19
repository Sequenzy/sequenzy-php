<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class ListCaptureSubmissionsResponseSubmissionsItem extends JsonSerializableType
{
    /**
     * @var string $companyId
     */
    #[JsonProperty('companyId')]
    public string $companyId;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var array<string, string> $fieldLabels
     */
    #[JsonProperty('fieldLabels'), ArrayType(['string' => 'string'])]
    public array $fieldLabels;

    /**
     * @var ?string $formId
     */
    #[JsonProperty('formId')]
    public ?string $formId;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $landingPageId
     */
    #[JsonProperty('landingPageId')]
    public ?string $landingPageId;

    /**
     * @var ListCaptureSubmissionsResponseSubmissionsItemPayload $payload
     */
    #[JsonProperty('payload')]
    public ListCaptureSubmissionsResponseSubmissionsItemPayload $payload;

    /**
     * @var ?string $popupId
     */
    #[JsonProperty('popupId')]
    public ?string $popupId;

    /**
     * @var ?string $sourceId
     */
    #[JsonProperty('sourceId')]
    public ?string $sourceId;

    /**
     * @var ?value-of<ListCaptureSubmissionsResponseSubmissionsItemSourceType> $sourceType
     */
    #[JsonProperty('sourceType')]
    public ?string $sourceType;

    /**
     * @var string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public string $subscriberId;

    /**
     * @param array{
     *   companyId: string,
     *   createdAt: DateTime,
     *   fieldLabels: array<string, string>,
     *   id: string,
     *   payload: ListCaptureSubmissionsResponseSubmissionsItemPayload,
     *   subscriberId: string,
     *   formId?: ?string,
     *   landingPageId?: ?string,
     *   popupId?: ?string,
     *   sourceId?: ?string,
     *   sourceType?: ?value-of<ListCaptureSubmissionsResponseSubmissionsItemSourceType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->createdAt = $values['createdAt'];
        $this->fieldLabels = $values['fieldLabels'];
        $this->formId = $values['formId'] ?? null;
        $this->id = $values['id'];
        $this->landingPageId = $values['landingPageId'] ?? null;
        $this->payload = $values['payload'];
        $this->popupId = $values['popupId'] ?? null;
        $this->sourceId = $values['sourceId'] ?? null;
        $this->sourceType = $values['sourceType'] ?? null;
        $this->subscriberId = $values['subscriberId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
