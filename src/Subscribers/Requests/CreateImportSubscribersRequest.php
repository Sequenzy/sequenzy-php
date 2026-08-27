<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Subscribers\Types\CreateImportSubscribersRequestDuplicateStrategy;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Subscribers\Types\CreateImportSubscribersRequestOptInMode;
use Sequenzy\Types\SubscriberImportRecord;

class CreateImportSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?string $defaultPhoneCountry
     */
    #[JsonProperty('defaultPhoneCountry')]
    public ?string $defaultPhoneCountry;

    /**
     * @var ?value-of<CreateImportSubscribersRequestDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?bool $enrollInSequences
     */
    #[JsonProperty('enrollInSequences')]
    public ?bool $enrollInSequences;

    /**
     * @var ?string $fileName
     */
    #[JsonProperty('fileName')]
    public ?string $fileName;

    /**
     * @var ?string $idempotencyKey Caller-owned key (1-255 characters, not blank) that makes retrying this request safe. The key is scoped to the request content - resending the same request returns the already-queued import with deduplicated true, while different content under the same key queues a new import. A blank key is rejected with 400.
     */
    #[JsonProperty('idempotencyKey')]
    public ?string $idempotencyKey;

    /**
     * @var ?array<string> $listIds
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?value-of<CreateImportSubscribersRequestOptInMode> $optInMode
     */
    #[JsonProperty('optInMode')]
    public ?string $optInMode;

    /**
     * @var ?bool $smsConsent
     */
    #[JsonProperty('smsConsent')]
    public ?bool $smsConsent;

    /**
     * @var array<SubscriberImportRecord> $subscribers
     */
    #[JsonProperty('subscribers'), ArrayType([SubscriberImportRecord::class])]
    public array $subscribers;

    /**
     * @param array{
     *   subscribers: array<SubscriberImportRecord>,
     *   defaultPhoneCountry?: ?string,
     *   duplicateStrategy?: ?value-of<CreateImportSubscribersRequestDuplicateStrategy>,
     *   enrollInSequences?: ?bool,
     *   fileName?: ?string,
     *   idempotencyKey?: ?string,
     *   listIds?: ?array<string>,
     *   optInMode?: ?value-of<CreateImportSubscribersRequestOptInMode>,
     *   smsConsent?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->defaultPhoneCountry = $values['defaultPhoneCountry'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->enrollInSequences = $values['enrollInSequences'] ?? null;
        $this->fileName = $values['fileName'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->optInMode = $values['optInMode'] ?? null;
        $this->smsConsent = $values['smsConsent'] ?? null;
        $this->subscribers = $values['subscribers'];
    }
}
