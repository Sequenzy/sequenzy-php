<?php

namespace Sequenzy\References\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListEmailReferencesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListEmailReferencesResponseBrandsItem> $brands With `scope=similar`, the gallery brands most like you, closest first. Empty for `scope=all`.
     */
    #[JsonProperty('brands'), ArrayType([ListEmailReferencesResponseBrandsItem::class])]
    public ?array $brands;

    /**
     * @var ?array<ListEmailReferencesResponseEmailsItem> $emails
     */
    #[JsonProperty('emails'), ArrayType([ListEmailReferencesResponseEmailsItem::class])]
    public ?array $emails;

    /**
     * @var ?value-of<ListEmailReferencesResponseKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $pageCount
     */
    #[JsonProperty('pageCount')]
    public ?int $pageCount;

    /**
     * @var ?value-of<ListEmailReferencesResponseProfile> $profile `missing` when your company has neither a description nor company context to find brands like you; `scope=similar` is then empty. Always `ready` for `scope=all`.
     */
    #[JsonProperty('profile')]
    public ?string $profile;

    /**
     * @var ?value-of<ListEmailReferencesResponseScope> $scope
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @var ?array<ListEmailReferencesResponseSequencesItem> $sequences For `kind=sequence` on the first page only.
     */
    #[JsonProperty('sequences'), ArrayType([ListEmailReferencesResponseSequencesItem::class])]
    public ?array $sequences;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   brands?: ?array<ListEmailReferencesResponseBrandsItem>,
     *   emails?: ?array<ListEmailReferencesResponseEmailsItem>,
     *   kind?: ?value-of<ListEmailReferencesResponseKind>,
     *   page?: ?int,
     *   pageCount?: ?int,
     *   profile?: ?value-of<ListEmailReferencesResponseProfile>,
     *   scope?: ?value-of<ListEmailReferencesResponseScope>,
     *   sequences?: ?array<ListEmailReferencesResponseSequencesItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brands = $values['brands'] ?? null;
        $this->emails = $values['emails'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->pageCount = $values['pageCount'] ?? null;
        $this->profile = $values['profile'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->sequences = $values['sequences'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
