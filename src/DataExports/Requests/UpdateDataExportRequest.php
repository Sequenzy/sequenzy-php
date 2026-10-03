<?php

namespace Sequenzy\DataExports\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\DataExports\Types\UpdateDataExportRequestDatasetsItem;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\DataExports\Types\UpdateDataExportRequestFrequency;

class UpdateDataExportRequest extends JsonSerializableType
{
    /**
     * @var ?string $accessKeyId Must be sent together with secretAccessKey.
     */
    #[JsonProperty('accessKeyId')]
    public ?string $accessKeyId;

    /**
     * @var ?string $bucket
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @var ?array<value-of<UpdateDataExportRequestDatasetsItem>> $datasets
     */
    #[JsonProperty('datasets'), ArrayType(['string'])]
    public ?array $datasets;

    /**
     * @var ?string $endpoint Send null or an empty string to clear a custom endpoint.
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?value-of<UpdateDataExportRequestFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var ?bool $isEnabled false pauses the export, true resumes it.
     */
    #[JsonProperty('isEnabled')]
    public ?bool $isEnabled;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $pathPrefix
     */
    #[JsonProperty('pathPrefix')]
    public ?string $pathPrefix;

    /**
     * @var ?string $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?string $secretAccessKey Must be sent together with accessKeyId.
     */
    #[JsonProperty('secretAccessKey')]
    public ?string $secretAccessKey;

    /**
     * @param array{
     *   accessKeyId?: ?string,
     *   bucket?: ?string,
     *   datasets?: ?array<value-of<UpdateDataExportRequestDatasetsItem>>,
     *   endpoint?: ?string,
     *   frequency?: ?value-of<UpdateDataExportRequestFrequency>,
     *   isEnabled?: ?bool,
     *   name?: ?string,
     *   pathPrefix?: ?string,
     *   region?: ?string,
     *   secretAccessKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accessKeyId = $values['accessKeyId'] ?? null;
        $this->bucket = $values['bucket'] ?? null;
        $this->datasets = $values['datasets'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->isEnabled = $values['isEnabled'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->pathPrefix = $values['pathPrefix'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->secretAccessKey = $values['secretAccessKey'] ?? null;
    }
}
