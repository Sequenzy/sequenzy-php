<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\TransactionalSendDiagnostics;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Union;

class SendTransactionalResponseTransactional extends JsonSerializableType
{
    /**
     * @var ?TransactionalSendDiagnostics $diagnostics
     */
    #[JsonProperty('diagnostics')]
    public ?TransactionalSendDiagnostics $diagnostics;

    /**
     * @var ?string $emailSendId Durable email delivery ID. Use this with GET /email-sends/{emailSendId}.
     */
    #[JsonProperty('emailSendId')]
    public ?string $emailSendId;

    /**
     * @var ?value-of<SendTransactionalResponseTransactionalEmailType> $emailType Delivery policy accepted for the queued email.
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var ?bool $idempotentReplay True when this response replays an earlier request with the same Idempotency-Key.
     */
    #[JsonProperty('idempotentReplay')]
    public ?bool $idempotentReplay;

    /**
     * @var ?string $jobId Legacy queue identifier retained for response compatibility.
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var (
     *    string
     *   |array<string>
     * )|null $to
     */
    #[JsonProperty('to'), Union('string', ['string'], 'null')]
    public string|array|null $to;

    /**
     * @var ?SendTransactionalResponseTransactionalTransactional $transactional
     */
    #[JsonProperty('transactional')]
    public ?SendTransactionalResponseTransactionalTransactional $transactional;

    /**
     * @param array{
     *   diagnostics?: ?TransactionalSendDiagnostics,
     *   emailSendId?: ?string,
     *   emailType?: ?value-of<SendTransactionalResponseTransactionalEmailType>,
     *   idempotentReplay?: ?bool,
     *   jobId?: ?string,
     *   success?: ?bool,
     *   to?: (
     *    string
     *   |array<string>
     * )|null,
     *   transactional?: ?SendTransactionalResponseTransactionalTransactional,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->diagnostics = $values['diagnostics'] ?? null;
        $this->emailSendId = $values['emailSendId'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->idempotentReplay = $values['idempotentReplay'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
