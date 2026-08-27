<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Exception;

class FilterGroupChildrenItem extends JsonSerializableType
{
    /**
     * @var (
     *    'filter'
     *   |'group'
     *   |'_unknown'
     * ) $kind
     */
    public readonly string $kind;

    /**
     * @var (
     *    FilterLeaf
     *   |FilterGroup
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   kind: (
     *    'filter'
     *   |'group'
     *   |'_unknown'
     * ),
     *   value: (
     *    FilterLeaf
     *   |FilterGroup
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->kind = $values['kind'];
        $this->value = $values['value'];
    }

    /**
     * @param FilterLeaf $filter
     * @return FilterGroupChildrenItem
     */
    public static function filter(FilterLeaf $filter): FilterGroupChildrenItem
    {
        return new FilterGroupChildrenItem([
            'kind' => 'filter',
            'value' => $filter,
        ]);
    }

    /**
     * @param FilterGroup $group
     * @return FilterGroupChildrenItem
     */
    public static function group(FilterGroup $group): FilterGroupChildrenItem
    {
        return new FilterGroupChildrenItem([
            'kind' => 'group',
            'value' => $group,
        ]);
    }

    /**
     * @return bool
     */
    public function isFilter(): bool
    {
        return $this->value instanceof FilterLeaf && $this->kind === 'filter';
    }

    /**
     * @return FilterLeaf
     */
    public function asFilter(): FilterLeaf
    {
        if (!($this->value instanceof FilterLeaf && $this->kind === 'filter')) {
            throw new Exception(
                "Expected filter; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isGroup(): bool
    {
        return $this->value instanceof FilterGroup && $this->kind === 'group';
    }

    /**
     * @return FilterGroup
     */
    public function asGroup(): FilterGroup
    {
        if (!($this->value instanceof FilterGroup && $this->kind === 'group')) {
            throw new Exception(
                "Expected group; got " . $this->kind . " with value of type " . get_debug_type($this->value),
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
        $result['kind'] = $this->kind;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->kind) {
            case 'filter':
                $value = $this->asFilter()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'group':
                $value = $this->asGroup()->jsonSerialize();
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
        if (!array_key_exists('kind', $data)) {
            throw new Exception(
                "JSON data is missing property 'kind'",
            );
        }
        $kind = $data['kind'];
        if (!(is_string($kind))) {
            throw new Exception(
                "Expected property 'kind' in JSON data to be string, instead received " . get_debug_type($data['kind']),
            );
        }

        $args['kind'] = $kind;
        switch ($kind) {
            case 'filter':
                $args['value'] = FilterLeaf::jsonDeserialize($data);
                break;
            case 'group':
                $args['value'] = FilterGroup::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['kind'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
