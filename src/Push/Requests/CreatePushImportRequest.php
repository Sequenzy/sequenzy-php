<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Push\Types\CreatePushImportRequestCustomerIoRegion;
use Sequenzy\Push\Types\CreatePushImportRequestPlatformsItem;
use Sequenzy\Push\Types\CreatePushImportRequestSource;

class CreatePushImportRequest extends JsonSerializableType
{
    /**
     * @var ?string $apiKey Source API key, required except for csv. OneSignal App API key, Braze REST API key with users.export.segment, or Customer.io App API key. Stored encrypted and never returned. Deleted once the devices are read, or when the import is canceled; a failed import keeps it so it can be resumed.
     */
    #[JsonProperty('apiKey')]
    public ?string $apiKey;

    /**
     * @var ?array<string> $appIds Only import devices of these source apps (Braze app name, Customer.io app_identifier, CSV app_id). Devices without an app are kept.
     */
    #[JsonProperty('appIds'), ArrayType(['string'])]
    public ?array $appIds;

    /**
     * @var ?string $brazeRestEndpoint Required for braze. Your instance's REST endpoint, such as rest.iad-01.braze.com. Only Braze REST hosts are accepted.
     */
    #[JsonProperty('brazeRestEndpoint')]
    public ?string $brazeRestEndpoint;

    /**
     * @var ?string $brazeSegmentId Required for braze. API identifier of a segment containing the users to import.
     */
    #[JsonProperty('brazeSegmentId')]
    public ?string $brazeSegmentId;

    /**
     * @var ?string $csv csv source only. The file or its first part, at most 5 MB, with a header row. Needs token and platform columns plus external_id or email.
     */
    #[JsonProperty('csv')]
    public ?string $csv;

    /**
     * @var ?int $csvParts csv source only, with csv. How many parts you will send, including the first. When set, starting is refused until every part has been added, so an interrupted upload is never imported partially. More parts than declared are rejected.
     */
    #[JsonProperty('csvParts')]
    public ?int $csvParts;

    /**
     * @var ?value-of<CreatePushImportRequestCustomerIoRegion> $customerIoRegion
     */
    #[JsonProperty('customerIoRegion')]
    public ?string $customerIoRegion;

    /**
     * @var ?string $customerIoSegmentId Required for customer_io. ID of a segment containing the people to import.
     */
    #[JsonProperty('customerIoSegmentId')]
    public ?string $customerIoSegmentId;

    /**
     * @var ?bool $importAttributes Copy source tags and custom attributes onto contacts, only for keys a contact does not have yet.
     */
    #[JsonProperty('importAttributes')]
    public ?bool $importAttributes;

    /**
     * @var ?string $onesignalAppId Required for onesignal. The OneSignal App ID (UUID).
     */
    #[JsonProperty('onesignalAppId')]
    public ?string $onesignalAppId;

    /**
     * @var ?array<value-of<CreatePushImportRequestPlatformsItem>> $platforms Default both.
     */
    #[JsonProperty('platforms'), ArrayType(['string'])]
    public ?array $platforms;

    /**
     * @var value-of<CreatePushImportRequestSource> $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @param array{
     *   source: value-of<CreatePushImportRequestSource>,
     *   apiKey?: ?string,
     *   appIds?: ?array<string>,
     *   brazeRestEndpoint?: ?string,
     *   brazeSegmentId?: ?string,
     *   csv?: ?string,
     *   csvParts?: ?int,
     *   customerIoRegion?: ?value-of<CreatePushImportRequestCustomerIoRegion>,
     *   customerIoSegmentId?: ?string,
     *   importAttributes?: ?bool,
     *   onesignalAppId?: ?string,
     *   platforms?: ?array<value-of<CreatePushImportRequestPlatformsItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiKey = $values['apiKey'] ?? null;
        $this->appIds = $values['appIds'] ?? null;
        $this->brazeRestEndpoint = $values['brazeRestEndpoint'] ?? null;
        $this->brazeSegmentId = $values['brazeSegmentId'] ?? null;
        $this->csv = $values['csv'] ?? null;
        $this->csvParts = $values['csvParts'] ?? null;
        $this->customerIoRegion = $values['customerIoRegion'] ?? null;
        $this->customerIoSegmentId = $values['customerIoSegmentId'] ?? null;
        $this->importAttributes = $values['importAttributes'] ?? null;
        $this->onesignalAppId = $values['onesignalAppId'] ?? null;
        $this->platforms = $values['platforms'] ?? null;
        $this->source = $values['source'];
    }
}
