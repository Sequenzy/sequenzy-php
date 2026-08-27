<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SubscriberUpdateConfig;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Config for advanced nodeType steps. Required fields depend on nodeType: action_add_tag and action_remove_tag need tagId or tagName; action_add_to_list and action_remove_from_list need listId; action_update_attributes uses the Update Subscriber fields and may reference the trigger event payload; logic_wait_for_event needs eventName plus optional timeoutDays and timeoutAction; logic_condition needs conditionType plus that condition's resource field; action_webhook needs an HTTPS url plus optional method, headers, body, resultKey, and onError; action_ai needs prompt, resultKey, and outputFields plus optional includeTags, includeEventProperties, includeRecentEvents, recentEventLimit, includeAttributes, and onError; logic_delay uses delayDays, delayHours, and delayMinutes. Fields that do not apply to the node type are dropped.
 */
class SequencePathStepConfig extends JsonSerializableType
{
    use SubscriberUpdateConfig;

    /**
     * @var ?value-of<SequencePathStepConfigActivityScope> $activityScope logic_condition. Scope for event_received and link_clicked checks.
     */
    #[JsonProperty('activityScope')]
    public ?string $activityScope;

    /**
     * @var ?string $body action_webhook. Optional JSON body template for POST/PUT/PATCH requests. Must be valid JSON as written, with merge tags inside quoted string values; a tag in a bare value position is rejected. Tags are resolved at execution time. When omitted, a default payload with the subscriber and sequence context is sent.
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?value-of<SequencePathStepConfigConditionType> $conditionType logic_condition. Condition evaluated before continuing. has_phone and sms_subscribed need no resource fields.
     */
    #[JsonProperty('conditionType')]
    public ?string $conditionType;

    /**
     * @var ?float $delayDays logic_delay. Whole days to wait.
     */
    #[JsonProperty('delayDays')]
    public ?float $delayDays;

    /**
     * @var ?float $delayHours logic_delay. Hours to wait.
     */
    #[JsonProperty('delayHours')]
    public ?float $delayHours;

    /**
     * @var ?float $delayMinutes logic_delay. Minutes to wait.
     */
    #[JsonProperty('delayMinutes')]
    public ?float $delayMinutes;

    /**
     * @var ?string $eventName logic_wait_for_event and event_received conditions. Event to wait for or check.
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?string $fieldName logic_condition. Subscriber attribute name/path for field comparisons.
     */
    #[JsonProperty('fieldName')]
    public ?string $fieldName;

    /**
     * @var ?string $fieldValue logic_condition. Comparison value for field comparisons.
     */
    #[JsonProperty('fieldValue')]
    public ?string $fieldValue;

    /**
     * @var ?array<string, string> $headers action_webhook. Optional string-valued request headers. Values support merge tags. Secret values are redacted on sequence reads.
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'string'])]
    public ?array $headers;

    /**
     * @var ?array<string> $includeAttributes action_ai. Custom attribute keys to include in the prompt context (max 30). Only the listed keys are sent.
     */
    #[JsonProperty('includeAttributes'), ArrayType(['string'])]
    public ?array $includeAttributes;

    /**
     * @var ?bool $includeEventProperties action_ai. Include the enrollment's trigger event name and properties in the prompt context.
     */
    #[JsonProperty('includeEventProperties')]
    public ?bool $includeEventProperties;

    /**
     * @var ?bool $includeRecentEvents action_ai. Include the contact's most recent custom events (newest first) in the prompt context.
     */
    #[JsonProperty('includeRecentEvents')]
    public ?bool $includeRecentEvents;

    /**
     * @var ?bool $includeTags action_ai. Include the contact's tags in the prompt context.
     */
    #[JsonProperty('includeTags')]
    public ?bool $includeTags;

    /**
     * @var ?string $linkUrl logic_condition. Optional URL substring for link_clicked. Omit to match any tracked click.
     */
    #[JsonProperty('linkUrl')]
    public ?string $linkUrl;

    /**
     * @var ?string $listId action_add_to_list / action_remove_from_list / in_list. Must match an existing list in this company; listName is filled in for you.
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?string $listName Optional cached list display name for list actions.
     */
    #[JsonProperty('listName')]
    public ?string $listName;

    /**
     * @var ?value-of<SequencePathStepConfigMethod> $method action_webhook. HTTP method. Defaults to POST.
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?value-of<SequencePathStepConfigOnError> $onError action_webhook / action_ai. Behavior when the step fails - continue to the next step, exit the sequence, or fail the enrollment. Defaults to fail for webhooks and continue for AI steps (fallbacks fill the output fields).
     */
    #[JsonProperty('onError')]
    public ?string $onError;

    /**
     * @var ?array<SequencePathStepConfigOutputFieldsItem> $outputFields action_ai. Named values the model must return (1-10). Each key becomes a {{ai.KEY.<key>}} merge tag for later steps. fallback is used when generation fails so emails still send with sensible copy. Combined field maxLength values must fit the step's conservative 2000-token multilingual response budget plus JSON overhead.
     */
    #[JsonProperty('outputFields'), ArrayType([SequencePathStepConfigOutputFieldsItem::class])]
    public ?array $outputFields;

    /**
     * @var ?string $prompt action_ai. Prompt template sent to the model, resolved per contact at execution time. Supports merge tags like {{first_name}}, {{event.plan}}, and {{webhooks.KEY.data.field}}. Max 8000 characters.
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?int $recentEventLimit action_ai. How many recent events to include when includeRecentEvents is true. Defaults to 10.
     */
    #[JsonProperty('recentEventLimit')]
    public ?int $recentEventLimit;

    /**
     * @var ?string $resultKey action_webhook / action_ai. Where the result is saved for the enrollment. Later steps reference it via {{webhooks.KEY.data.field}} (webhook) or {{ai.KEY.field}} (AI) merge tags. Required for action_ai. Must start with a letter and use only letters, numbers, or underscores (max 64 chars).
     */
    #[JsonProperty('resultKey')]
    public ?string $resultKey;

    /**
     * @var ?string $segmentId logic_condition. Segment ID for in_segment.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var ?string $segmentName Optional cached segment display name.
     */
    #[JsonProperty('segmentName')]
    public ?string $segmentName;

    /**
     * @var ?string $tagId action_add_tag / action_remove_tag. Tag ID; tag actions resolve it by ID only, so pass a name in tagName instead. has_tag and does_not_have_tag also accept a tag name here. Missing tag definitions are created automatically.
     */
    #[JsonProperty('tagId')]
    public ?string $tagId;

    /**
     * @var ?string $tagName action_add_tag / action_remove_tag / has_tag / does_not_have_tag. Tag name; use instead of tagId when you only know the name.
     */
    #[JsonProperty('tagName')]
    public ?string $tagName;

    /**
     * @var ?value-of<SequencePathStepConfigTimeoutAction> $timeoutAction logic_wait_for_event. Continue to the next node or exit the sequence on timeout. Defaults to continue.
     */
    #[JsonProperty('timeoutAction')]
    public ?string $timeoutAction;

    /**
     * @var ?float $timeoutDays logic_wait_for_event. Maximum wait in whole days from 1 to 365. Defaults to 7.
     */
    #[JsonProperty('timeoutDays')]
    public ?float $timeoutDays;

    /**
     * @var ?string $url action_webhook. Destination HTTPS URL called when a subscriber reaches this step. Supports merge tags like {{email}} and {{event.order_id}} resolved at execution time.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   customAttributeUpdates?: ?array<SubscriberUpdateConfigCustomAttributeUpdatesItem>,
     *   firstName?: ?string,
     *   label?: ?string,
     *   lastName?: ?string,
     *   status?: ?value-of<SubscriberUpdateConfigStatus>,
     *   activityScope?: ?value-of<SequencePathStepConfigActivityScope>,
     *   body?: ?string,
     *   conditionType?: ?value-of<SequencePathStepConfigConditionType>,
     *   delayDays?: ?float,
     *   delayHours?: ?float,
     *   delayMinutes?: ?float,
     *   eventName?: ?string,
     *   fieldName?: ?string,
     *   fieldValue?: ?string,
     *   headers?: ?array<string, string>,
     *   includeAttributes?: ?array<string>,
     *   includeEventProperties?: ?bool,
     *   includeRecentEvents?: ?bool,
     *   includeTags?: ?bool,
     *   linkUrl?: ?string,
     *   listId?: ?string,
     *   listName?: ?string,
     *   method?: ?value-of<SequencePathStepConfigMethod>,
     *   onError?: ?value-of<SequencePathStepConfigOnError>,
     *   outputFields?: ?array<SequencePathStepConfigOutputFieldsItem>,
     *   prompt?: ?string,
     *   recentEventLimit?: ?int,
     *   resultKey?: ?string,
     *   segmentId?: ?string,
     *   segmentName?: ?string,
     *   tagId?: ?string,
     *   tagName?: ?string,
     *   timeoutAction?: ?value-of<SequencePathStepConfigTimeoutAction>,
     *   timeoutDays?: ?float,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributeUpdates = $values['customAttributeUpdates'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->activityScope = $values['activityScope'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->conditionType = $values['conditionType'] ?? null;
        $this->delayDays = $values['delayDays'] ?? null;
        $this->delayHours = $values['delayHours'] ?? null;
        $this->delayMinutes = $values['delayMinutes'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->fieldName = $values['fieldName'] ?? null;
        $this->fieldValue = $values['fieldValue'] ?? null;
        $this->headers = $values['headers'] ?? null;
        $this->includeAttributes = $values['includeAttributes'] ?? null;
        $this->includeEventProperties = $values['includeEventProperties'] ?? null;
        $this->includeRecentEvents = $values['includeRecentEvents'] ?? null;
        $this->includeTags = $values['includeTags'] ?? null;
        $this->linkUrl = $values['linkUrl'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listName = $values['listName'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->onError = $values['onError'] ?? null;
        $this->outputFields = $values['outputFields'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->recentEventLimit = $values['recentEventLimit'] ?? null;
        $this->resultKey = $values['resultKey'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->segmentName = $values['segmentName'] ?? null;
        $this->tagId = $values['tagId'] ?? null;
        $this->tagName = $values['tagName'] ?? null;
        $this->timeoutAction = $values['timeoutAction'] ?? null;
        $this->timeoutDays = $values['timeoutDays'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
