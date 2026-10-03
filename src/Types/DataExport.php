<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Core\Types\Union;

/**
 * A bucket that Sequenzy streams workspace data to as gzipped JSON lines.
 */
class DataExport extends JsonSerializableType
{
    /**
     * @var ?string $accessKeyId Masked access key ID, for example AKIA…WXYZ. The secret is never returned.
     */
    #[JsonProperty('accessKeyId')]
    public ?string $accessKeyId;

    /**
     * @var ?string $bucket
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @var ?int $consecutiveFailures
     */
    #[JsonProperty('consecutiveFailures')]
    public ?int $consecutiveFailures;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<value-of<DataExportDatasetsItem>> $datasets
     */
    #[JsonProperty('datasets'), ArrayType(['string'])]
    public ?array $datasets;

    /**
     * @var ?string $endpoint
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?array<string, ?string> $exportedThrough Per dataset. Event datasets: everything recorded up to this timestamp has been written. subscribers: date of the last complete snapshot. null until the first export of that dataset.
     */
    #[JsonProperty('exportedThrough'), ArrayType(['string' => new Union('string', 'null')])]
    public ?array $exportedThrough;

    /**
     * @var ?value-of<DataExportFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isEnabled
     */
    #[JsonProperty('isEnabled')]
    public ?bool $isEnabled;

    /**
     * @var ?string $lastError
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?DateTime $lastErrorAt
     */
    #[JsonProperty('lastErrorAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastErrorAt;

    /**
     * @var ?DateTime $lastRunAt
     */
    #[JsonProperty('lastRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastRunAt;

    /**
     * @var ?DateTime $lastSuccessAt
     */
    #[JsonProperty('lastSuccessAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSuccessAt;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $nextRunAt
     */
    #[JsonProperty('nextRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRunAt;

    /**
     * @var ?string $pathPrefix
     */
    #[JsonProperty('pathPrefix')]
    public ?string $pathPrefix;

    /**
     * @var ?value-of<DataExportProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?DateTime $startFrom
     */
    #[JsonProperty('startFrom'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startFrom;

    /**
     * @var ?value-of<DataExportStatus> $status failed means the last run failed; it retries automatically with backoff.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $totalRowsExported
     */
    #[JsonProperty('totalRowsExported')]
    public ?int $totalRowsExported;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   accessKeyId?: ?string,
     *   bucket?: ?string,
     *   consecutiveFailures?: ?int,
     *   createdAt?: ?DateTime,
     *   datasets?: ?array<value-of<DataExportDatasetsItem>>,
     *   endpoint?: ?string,
     *   exportedThrough?: ?array<string, ?string>,
     *   frequency?: ?value-of<DataExportFrequency>,
     *   id?: ?string,
     *   isEnabled?: ?bool,
     *   lastError?: ?string,
     *   lastErrorAt?: ?DateTime,
     *   lastRunAt?: ?DateTime,
     *   lastSuccessAt?: ?DateTime,
     *   name?: ?string,
     *   nextRunAt?: ?DateTime,
     *   pathPrefix?: ?string,
     *   provider?: ?value-of<DataExportProvider>,
     *   region?: ?string,
     *   startFrom?: ?DateTime,
     *   status?: ?value-of<DataExportStatus>,
     *   totalRowsExported?: ?int,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accessKeyId = $values['accessKeyId'] ?? null;
        $this->bucket = $values['bucket'] ?? null;
        $this->consecutiveFailures = $values['consecutiveFailures'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->datasets = $values['datasets'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->exportedThrough = $values['exportedThrough'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isEnabled = $values['isEnabled'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->lastErrorAt = $values['lastErrorAt'] ?? null;
        $this->lastRunAt = $values['lastRunAt'] ?? null;
        $this->lastSuccessAt = $values['lastSuccessAt'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nextRunAt = $values['nextRunAt'] ?? null;
        $this->pathPrefix = $values['pathPrefix'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->startFrom = $values['startFrom'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->totalRowsExported = $values['totalRowsExported'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
