<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * A single subscriber filter rule.
 */
class FilterLeaf extends JsonSerializableType
{
    /**
     * @var value-of<FilterLeafField> $field
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?value-of<FilterLeafKind> $kind Required when the filter is inside a v2 root group.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var value-of<FilterLeafOperator> $operator Valid operators depend on the field. status/segment: is, is_not. smsStatus: is, is_not (values: subscribed, unsubscribed, not_subscribed). phone: is_not_empty, is_empty (empty value). tag: contains, not_contains, is_empty, is_not_empty. email: contains, not_contains for domain or substring matching, is, is_not for an exact case-insensitive address. emailProvider/list: is, is_not, is_empty, is_not_empty. firstName/lastName: contains, not_contains, is_empty, is_not_empty. added: less_than, more_than. attribute: is, is_not, is_empty, is_not_empty, gte, lte, gt, lt, contains, not_contains. event and email engagement fields: is, is_not, at_least, less_than_count. emailBounced also supports is_temporary_bounce and is_permanent_bounce. stripeProduct: is, is_not, at_least, less_than_count. stripeCurrentProduct/stripeTrialProduct: is, is_not, gte, lte, gt, lt. commerceProduct/commerceCollection: is, is_not, at_least, less_than_count.
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var string $value Event filters use `eventName:30d` or `eventName:5:30d`. Segment filters use a segment ID. Email engagement fields use a rolling time window (`7d`, `30d`, `90d`, `180d`, `all`), a specific campaign via `campaign:<campaign_id>`, an email-type scope via `marketing:<timeRange>` (marketing-policy campaign, automation, and Send API traffic) or `transactional:<timeRange>` (transactional-policy sends; with is/is_not or the emailBounced subtype operators; scopes require a send-time policy snapshot, so ambiguous older events remain unscoped), or `count:timeRange` (such as `10:30d` or `10:all`) with at_least/less_than_count. Stripe product filters use `prod_123` for bought/current/trialing checks, `prod_123:3` for payment thresholds, and product-scoped values such as `prod_123:is_canceled`, `prod_123:cancels_at:2026-05-26`, `prod_123:end_at:2026-05-26`, or `prod_123:start_at:7 days ago`. Commerce product filters use `provider:productId` (provider one of `shopify`, `woocommerce`, `api`), optionally with an order-count threshold (`shopify:42:2`); a bare product ID matches the ID on any provider. Commerce collection filters use a collection ID or handle (`skincare`), optionally provider-prefixed and/or with an order-count threshold (`shopify:skincare:2`), and match anyone whose orders contain any product currently in that collection.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<FilterLeafField>,
     *   id: string,
     *   operator: value-of<FilterLeafOperator>,
     *   value: string,
     *   kind?: ?value-of<FilterLeafKind>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->id = $values['id'];
        $this->kind = $values['kind'] ?? null;
        $this->operator = $values['operator'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
