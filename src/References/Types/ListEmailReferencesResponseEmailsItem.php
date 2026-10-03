<?php

namespace Sequenzy\References\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class ListEmailReferencesResponseEmailsItem extends JsonSerializableType
{
    /**
     * @var ?ListEmailReferencesResponseEmailsItemBrand $brand
     */
    #[JsonProperty('brand')]
    public ?ListEmailReferencesResponseEmailsItemBrand $brand;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $preheader
     */
    #[JsonProperty('preheader')]
    public ?string $preheader;

    /**
     * @var ?DateTime $sentAt
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $subtype
     */
    #[JsonProperty('subtype')]
    public ?string $subtype;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   brand?: ?ListEmailReferencesResponseEmailsItemBrand,
     *   id?: ?string,
     *   preheader?: ?string,
     *   sentAt?: ?DateTime,
     *   subject?: ?string,
     *   subtype?: ?string,
     *   type?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->preheader = $values['preheader'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->subtype = $values['subtype'] ?? null;
        $this->type = $values['type'] ?? null;
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
