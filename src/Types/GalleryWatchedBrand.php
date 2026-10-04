<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class GalleryWatchedBrand extends JsonSerializableType
{
    /**
     * @var ?GalleryWatchedBrandBrand $brand The gallery brand, once its emails are in the gallery.
     */
    #[JsonProperty('brand')]
    public ?GalleryWatchedBrandBrand $brand;

    /**
     * @var ?string $declineReason
     */
    #[JsonProperty('declineReason')]
    public ?string $declineReason;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?int $emailCount The brand's emails in the gallery. 0 unless `available`.
     */
    #[JsonProperty('emailCount')]
    public ?int $emailCount;

    /**
     * @var ?string $id Watch ID. The same row is a brand request, so this is also its request ID.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $latestEmailAt When its newest email in the gallery was sent. `null` unless `available`.
     */
    #[JsonProperty('latestEmailAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $latestEmailAt;

    /**
     * @var ?string $note
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var ?value-of<GalleryWatchedBrandStatus> $status `available`: its emails are in the gallery. `requested`: not in the gallery yet. `collecting`: the brand is added and its emails are being collected. `declined`: it will not be added; see `declineReason`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $watchedAt
     */
    #[JsonProperty('watchedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $watchedAt;

    /**
     * @param array{
     *   brand?: ?GalleryWatchedBrandBrand,
     *   declineReason?: ?string,
     *   domain?: ?string,
     *   emailCount?: ?int,
     *   id?: ?string,
     *   latestEmailAt?: ?DateTime,
     *   note?: ?string,
     *   status?: ?value-of<GalleryWatchedBrandStatus>,
     *   watchedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->declineReason = $values['declineReason'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->latestEmailAt = $values['latestEmailAt'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->watchedAt = $values['watchedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
