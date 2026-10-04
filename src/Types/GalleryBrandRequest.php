<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class GalleryBrandRequest extends JsonSerializableType
{
    /**
     * @var ?GalleryBrandRequestBrand $brand The gallery brand, once its emails are in the gallery.
     */
    #[JsonProperty('brand')]
    public ?GalleryBrandRequestBrand $brand;

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
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $note
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var ?DateTime $requestedAt
     */
    #[JsonProperty('requestedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $requestedAt;

    /**
     * @var ?value-of<GalleryBrandRequestStatus> $status `requested`: not in the gallery yet. `collecting`: the brand is added and its emails are being collected. `available`: its emails are in the gallery. `declined`: it will not be added; see `declineReason`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   brand?: ?GalleryBrandRequestBrand,
     *   declineReason?: ?string,
     *   domain?: ?string,
     *   id?: ?string,
     *   note?: ?string,
     *   requestedAt?: ?DateTime,
     *   status?: ?value-of<GalleryBrandRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->declineReason = $values['declineReason'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->requestedAt = $values['requestedAt'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
