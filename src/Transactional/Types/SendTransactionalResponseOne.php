<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\TransactionalSendDiagnostics;
use Sequenzy\Core\Types\Union;

class SendTransactionalResponseOne extends JsonSerializableType
{
    /**
     * @var ?array<string> $bcc Deduplicated BCC recipients; omitted when empty.
     */
    #[JsonProperty('bcc'), ArrayType(['string'])]
    public ?array $bcc;

    /**
     * @var ?array<string> $cc Deduplicated CC recipients; omitted when empty.
     */
    #[JsonProperty('cc'), ArrayType(['string'])]
    public ?array $cc;

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
     * @var ?value-of<SendTransactionalResponseOneEmailType> $emailType Delivery policy accepted for the queued email.
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
     * @param array{
     *   bcc?: ?array<string>,
     *   cc?: ?array<string>,
     *   diagnostics?: ?TransactionalSendDiagnostics,
     *   emailSendId?: ?string,
     *   emailType?: ?value-of<SendTransactionalResponseOneEmailType>,
     *   idempotentReplay?: ?bool,
     *   jobId?: ?string,
     *   success?: ?bool,
     *   to?: (
     *    string
     *   |array<string>
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bcc = $values['bcc'] ?? null;
        $this->cc = $values['cc'] ?? null;
        $this->diagnostics = $values['diagnostics'] ?? null;
        $this->emailSendId = $values['emailSendId'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->idempotentReplay = $values['idempotentReplay'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->to = $values['to'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
