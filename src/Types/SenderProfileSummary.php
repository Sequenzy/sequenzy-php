<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SenderProfileSummary extends JsonSerializableType
{
    /**
     * @var ?bool $canSend True when the domain is fully ready to send (DNS verified and activation finished).
     */
    #[JsonProperty('canSend')]
    public ?bool $canSend;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $domainId
     */
    #[JsonProperty('domainId')]
    public ?string $domainId;

    /**
     * @var ?string $domainStatus Aggregate verification status of the sending domain.
     */
    #[JsonProperty('domainStatus')]
    public ?string $domainStatus;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isDefault
     */
    #[JsonProperty('isDefault')]
    public ?bool $isDefault;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   canSend?: ?bool,
     *   createdAt?: ?DateTime,
     *   domain?: ?string,
     *   domainId?: ?string,
     *   domainStatus?: ?string,
     *   email?: ?string,
     *   id?: ?string,
     *   isDefault?: ?bool,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->canSend = $values['canSend'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->domainId = $values['domainId'] ?? null;
        $this->domainStatus = $values['domainStatus'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isDefault = $values['isDefault'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
