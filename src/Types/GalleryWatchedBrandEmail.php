<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class GalleryWatchedBrandEmail extends JsonSerializableType
{
    /**
     * @var ?GalleryEmailAnalysis $analysis
     */
    #[JsonProperty('analysis')]
    public ?GalleryEmailAnalysis $analysis;

    /**
     * @var ?GalleryWatchedBrandEmailBrand $brand
     */
    #[JsonProperty('brand')]
    public ?GalleryWatchedBrandEmailBrand $brand;

    /**
     * @var ?DateTime $collectedAt When the gallery received the email, usually a few hours after `sentAt`.
     */
    #[JsonProperty('collectedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $collectedAt;

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
     * @var ?string $url The email's gallery page. Also accepted as `url` by [Create Template from Example](/api-reference/templates/create-from-example).
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   analysis?: ?GalleryEmailAnalysis,
     *   brand?: ?GalleryWatchedBrandEmailBrand,
     *   collectedAt?: ?DateTime,
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
        $this->analysis = $values['analysis'] ?? null;
        $this->brand = $values['brand'] ?? null;
        $this->collectedAt = $values['collectedAt'] ?? null;
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
