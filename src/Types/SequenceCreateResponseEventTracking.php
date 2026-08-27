<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Endpoint, payload contract, example, documentation, and integration-guide pointer returned for custom event triggers.
 */
class SequenceCreateResponseEventTracking extends JsonSerializableType
{
    /**
     * @var ?string $docsUrl
     */
    #[JsonProperty('docsUrl')]
    public ?string $docsUrl;

    /**
     * @var ?string $endpoint
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?array<string, mixed> $examplePayload
     */
    #[JsonProperty('examplePayload'), ArrayType(['string' => 'mixed'])]
    public ?array $examplePayload;

    /**
     * @var ?bool $examplePayloadMatchesFilters Whether examplePayload already satisfies every normalized property filter. When false, adapt properties using payloadContract before sending the sample.
     */
    #[JsonProperty('examplePayloadMatchesFilters')]
    public ?bool $examplePayloadMatchesFilters;

    /**
     * @var ?string $examplePayloadNote Present when the generated example needs manual property adaptation before it satisfies every filter.
     */
    #[JsonProperty('examplePayloadNote')]
    public ?string $examplePayloadNote;

    /**
     * @var ?SequenceCreateResponseEventTrackingIntegrationGuide $integrationGuide
     */
    #[JsonProperty('integrationGuide')]
    public ?SequenceCreateResponseEventTrackingIntegrationGuide $integrationGuide;

    /**
     * @var ?string $method
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?SequenceCreateResponseEventTrackingPayloadContract $payloadContract
     */
    #[JsonProperty('payloadContract')]
    public ?SequenceCreateResponseEventTrackingPayloadContract $payloadContract;

    /**
     * @param array{
     *   docsUrl?: ?string,
     *   endpoint?: ?string,
     *   examplePayload?: ?array<string, mixed>,
     *   examplePayloadMatchesFilters?: ?bool,
     *   examplePayloadNote?: ?string,
     *   integrationGuide?: ?SequenceCreateResponseEventTrackingIntegrationGuide,
     *   method?: ?string,
     *   payloadContract?: ?SequenceCreateResponseEventTrackingPayloadContract,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->docsUrl = $values['docsUrl'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->examplePayload = $values['examplePayload'] ?? null;
        $this->examplePayloadMatchesFilters = $values['examplePayloadMatchesFilters'] ?? null;
        $this->examplePayloadNote = $values['examplePayloadNote'] ?? null;
        $this->integrationGuide = $values['integrationGuide'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->payloadContract = $values['payloadContract'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
