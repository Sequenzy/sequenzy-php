<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Exception;

class SequenceStopConditionMatchConfig extends JsonSerializableType
{
    /**
     * @var (
     *    'entry_audience'
     *   |'event_property'
     *   |'event_property_filter'
     *   |'field_value'
     *   |'_unknown'
     * ) $mode
     */
    public readonly string $mode;

    /**
     * @var (
     *    SequenceStopConditionMatchConfigEntryAudience
     *   |SequenceStopConditionMatchConfigEventProperty
     *   |SequenceStopConditionMatchConfigEventPropertyFilter
     *   |SequenceStopConditionMatchConfigFieldValue
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   mode: (
     *    'entry_audience'
     *   |'event_property'
     *   |'event_property_filter'
     *   |'field_value'
     *   |'_unknown'
     * ),
     *   value: (
     *    SequenceStopConditionMatchConfigEntryAudience
     *   |SequenceStopConditionMatchConfigEventProperty
     *   |SequenceStopConditionMatchConfigEventPropertyFilter
     *   |SequenceStopConditionMatchConfigFieldValue
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->mode = $values['mode'];
        $this->value = $values['value'];
    }

    /**
     * @param SequenceStopConditionMatchConfigEntryAudience $entryAudience
     * @return SequenceStopConditionMatchConfig
     */
    public static function entryAudience(SequenceStopConditionMatchConfigEntryAudience $entryAudience): SequenceStopConditionMatchConfig
    {
        return new SequenceStopConditionMatchConfig([
            'mode' => 'entry_audience',
            'value' => $entryAudience,
        ]);
    }

    /**
     * @param SequenceStopConditionMatchConfigEventProperty $eventProperty
     * @return SequenceStopConditionMatchConfig
     */
    public static function eventProperty(SequenceStopConditionMatchConfigEventProperty $eventProperty): SequenceStopConditionMatchConfig
    {
        return new SequenceStopConditionMatchConfig([
            'mode' => 'event_property',
            'value' => $eventProperty,
        ]);
    }

    /**
     * @param SequenceStopConditionMatchConfigEventPropertyFilter $eventPropertyFilter
     * @return SequenceStopConditionMatchConfig
     */
    public static function eventPropertyFilter(SequenceStopConditionMatchConfigEventPropertyFilter $eventPropertyFilter): SequenceStopConditionMatchConfig
    {
        return new SequenceStopConditionMatchConfig([
            'mode' => 'event_property_filter',
            'value' => $eventPropertyFilter,
        ]);
    }

    /**
     * @param SequenceStopConditionMatchConfigFieldValue $fieldValue
     * @return SequenceStopConditionMatchConfig
     */
    public static function fieldValue(SequenceStopConditionMatchConfigFieldValue $fieldValue): SequenceStopConditionMatchConfig
    {
        return new SequenceStopConditionMatchConfig([
            'mode' => 'field_value',
            'value' => $fieldValue,
        ]);
    }

    /**
     * @return bool
     */
    public function isEntryAudience(): bool
    {
        return $this->value instanceof SequenceStopConditionMatchConfigEntryAudience && $this->mode === 'entry_audience';
    }

    /**
     * @return SequenceStopConditionMatchConfigEntryAudience
     */
    public function asEntryAudience(): SequenceStopConditionMatchConfigEntryAudience
    {
        if (!($this->value instanceof SequenceStopConditionMatchConfigEntryAudience && $this->mode === 'entry_audience')) {
            throw new Exception(
                "Expected entry_audience; got " . $this->mode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEventProperty(): bool
    {
        return $this->value instanceof SequenceStopConditionMatchConfigEventProperty && $this->mode === 'event_property';
    }

    /**
     * @return SequenceStopConditionMatchConfigEventProperty
     */
    public function asEventProperty(): SequenceStopConditionMatchConfigEventProperty
    {
        if (!($this->value instanceof SequenceStopConditionMatchConfigEventProperty && $this->mode === 'event_property')) {
            throw new Exception(
                "Expected event_property; got " . $this->mode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEventPropertyFilter(): bool
    {
        return $this->value instanceof SequenceStopConditionMatchConfigEventPropertyFilter && $this->mode === 'event_property_filter';
    }

    /**
     * @return SequenceStopConditionMatchConfigEventPropertyFilter
     */
    public function asEventPropertyFilter(): SequenceStopConditionMatchConfigEventPropertyFilter
    {
        if (!($this->value instanceof SequenceStopConditionMatchConfigEventPropertyFilter && $this->mode === 'event_property_filter')) {
            throw new Exception(
                "Expected event_property_filter; got " . $this->mode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFieldValue(): bool
    {
        return $this->value instanceof SequenceStopConditionMatchConfigFieldValue && $this->mode === 'field_value';
    }

    /**
     * @return SequenceStopConditionMatchConfigFieldValue
     */
    public function asFieldValue(): SequenceStopConditionMatchConfigFieldValue
    {
        if (!($this->value instanceof SequenceStopConditionMatchConfigFieldValue && $this->mode === 'field_value')) {
            throw new Exception(
                "Expected field_value; got " . $this->mode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['mode'] = $this->mode;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->mode) {
            case 'entry_audience':
                $value = $this->asEntryAudience()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'event_property':
                $value = $this->asEventProperty()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'event_property_filter':
                $value = $this->asEventPropertyFilter()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'field_value':
                $value = $this->asFieldValue()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('mode', $data)) {
            throw new Exception(
                "JSON data is missing property 'mode'",
            );
        }
        $mode = $data['mode'];
        if (!(is_string($mode))) {
            throw new Exception(
                "Expected property 'mode' in JSON data to be string, instead received " . get_debug_type($data['mode']),
            );
        }

        $args['mode'] = $mode;
        switch ($mode) {
            case 'entry_audience':
                $args['value'] = SequenceStopConditionMatchConfigEntryAudience::jsonDeserialize($data);
                break;
            case 'event_property':
                $args['value'] = SequenceStopConditionMatchConfigEventProperty::jsonDeserialize($data);
                break;
            case 'event_property_filter':
                $args['value'] = SequenceStopConditionMatchConfigEventPropertyFilter::jsonDeserialize($data);
                break;
            case 'field_value':
                $args['value'] = SequenceStopConditionMatchConfigFieldValue::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['mode'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
