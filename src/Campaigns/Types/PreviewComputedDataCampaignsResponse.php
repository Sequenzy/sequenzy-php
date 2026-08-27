<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PreviewComputedDataCampaignsResponse extends JsonSerializableType
{
    /**
     * @var array<PreviewComputedDataCampaignsResponseListsItem> $lists
     */
    #[JsonProperty('lists'), ArrayType([PreviewComputedDataCampaignsResponseListsItem::class])]
    public array $lists;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<string, mixed> $variables
     */
    #[JsonProperty('variables'), ArrayType(['string' => 'mixed'])]
    public array $variables;

    /**
     * @param array{
     *   lists: array<PreviewComputedDataCampaignsResponseListsItem>,
     *   success: bool,
     *   variables: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->lists = $values['lists'];
        $this->success = $values['success'];
        $this->variables = $values['variables'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
