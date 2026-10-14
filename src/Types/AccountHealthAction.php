<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountHealthAction extends JsonSerializableType
{
    /**
     * @var ?AccountHealthActionApi $api Public API call that performs the action, relative to /api/v1.
     */
    #[JsonProperty('api')]
    public ?AccountHealthActionApi $api;

    /**
     * @var ?AccountHealthActionConfirm $confirm Prompt to show before performing the action because it changes live sending.
     */
    #[JsonProperty('confirm')]
    public ?AccountHealthActionConfirm $confirm;

    /**
     * @var ?value-of<AccountHealthActionKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $path Dashboard path under /dashboard/company/{companyId}, for actions that open a screen.
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?bool $primary The main fix. At most one action per insight is primary.
     */
    #[JsonProperty('primary')]
    public ?bool $primary;

    /**
     * @var ?string $targetId The sequence, campaign or sending domain the action works on.
     */
    #[JsonProperty('targetId')]
    public ?string $targetId;

    /**
     * @var ?bool $workspaceOnly Only owners and admins can perform it.
     */
    #[JsonProperty('workspaceOnly')]
    public ?bool $workspaceOnly;

    /**
     * @param array{
     *   api?: ?AccountHealthActionApi,
     *   confirm?: ?AccountHealthActionConfirm,
     *   kind?: ?value-of<AccountHealthActionKind>,
     *   label?: ?string,
     *   path?: ?string,
     *   primary?: ?bool,
     *   targetId?: ?string,
     *   workspaceOnly?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->api = $values['api'] ?? null;
        $this->confirm = $values['confirm'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->primary = $values['primary'] ?? null;
        $this->targetId = $values['targetId'] ?? null;
        $this->workspaceOnly = $values['workspaceOnly'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
