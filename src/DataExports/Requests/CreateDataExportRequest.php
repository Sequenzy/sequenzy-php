<?php

namespace Sequenzy\DataExports\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\DataExports\Types\CreateDataExportRequestDatasetsItem;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\DataExports\Types\CreateDataExportRequestFrequency;
use Sequenzy\DataExports\Types\CreateDataExportRequestProvider;
use DateTime;
use Sequenzy\Core\Types\Date;

class CreateDataExportRequest extends JsonSerializableType
{
    /**
     * @var string $accessKeyId Access key ID (GCS HMAC access ID).
     */
    #[JsonProperty('accessKeyId')]
    public string $accessKeyId;

    /**
     * @var string $bucket Bucket name, not a URL.
     */
    #[JsonProperty('bucket')]
    public string $bucket;

    /**
     * @var ?array<value-of<CreateDataExportRequestDatasetsItem>> $datasets
     */
    #[JsonProperty('datasets'), ArrayType(['string'])]
    public ?array $datasets;

    /**
     * @var ?string $endpoint HTTPS origin of an S3-compatible service (R2, MinIO, Backblaze). Must resolve to a public address. Not allowed for gcs.
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?value-of<CreateDataExportRequestFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $pathPrefix Folder inside the bucket. Leading and trailing slashes are removed.
     */
    #[JsonProperty('pathPrefix')]
    public ?string $pathPrefix;

    /**
     * @var value-of<CreateDataExportRequestProvider> $provider s3 for Amazon S3 or any S3-compatible service; gcs for Google Cloud Storage (HMAC keys).
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var ?string $region Bucket region. Required for Amazon S3 without a custom endpoint; defaults to auto otherwise.
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var string $secretAccessKey Secret access key. Stored encrypted and never returned.
     */
    #[JsonProperty('secretAccessKey')]
    public string $secretAccessKey;

    /**
     * @var ?DateTime $startFrom Include events recorded since this time, at most 30 days ago. Defaults to now.
     */
    #[JsonProperty('startFrom'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startFrom;

    /**
     * @param array{
     *   accessKeyId: string,
     *   bucket: string,
     *   name: string,
     *   provider: value-of<CreateDataExportRequestProvider>,
     *   secretAccessKey: string,
     *   datasets?: ?array<value-of<CreateDataExportRequestDatasetsItem>>,
     *   endpoint?: ?string,
     *   frequency?: ?value-of<CreateDataExportRequestFrequency>,
     *   pathPrefix?: ?string,
     *   region?: ?string,
     *   startFrom?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessKeyId = $values['accessKeyId'];
        $this->bucket = $values['bucket'];
        $this->datasets = $values['datasets'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->name = $values['name'];
        $this->pathPrefix = $values['pathPrefix'] ?? null;
        $this->provider = $values['provider'];
        $this->region = $values['region'] ?? null;
        $this->secretAccessKey = $values['secretAccessKey'];
        $this->startFrom = $values['startFrom'] ?? null;
    }
}
