<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateForAudienceCampaignsResponseCampaign extends JsonSerializableType
{
    /**
     * @var string $companyId
     */
    #[JsonProperty('companyId')]
    public string $companyId;

    /**
     * @var ?array<string, mixed> $email Linked blank email draft.
     */
    #[JsonProperty('email'), ArrayType(['string' => 'mixed'])]
    public ?array $email;

    /**
     * @var string $emailId
     */
    #[JsonProperty('emailId')]
    public string $emailId;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<CreateForAudienceCampaignsResponseCampaignStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var CreateForAudienceCampaignsResponseCampaignTargetLists $targetLists
     */
    #[JsonProperty('targetLists')]
    public CreateForAudienceCampaignsResponseCampaignTargetLists $targetLists;

    /**
     * @param array{
     *   companyId: string,
     *   emailId: string,
     *   id: string,
     *   name: string,
     *   status: value-of<CreateForAudienceCampaignsResponseCampaignStatus>,
     *   targetLists: CreateForAudienceCampaignsResponseCampaignTargetLists,
     *   email?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->email = $values['email'] ?? null;
        $this->emailId = $values['emailId'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->status = $values['status'];
        $this->targetLists = $values['targetLists'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
