<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Complete version 1 form builder document. Read content.blocks before replacing the array. Exactly one required email field and one submit button are required. Block IDs and field names must be unique. At most 200 total blocks and three levels of groups. See /api-reference/widgets/update-saved-form#content-blocks for writable fields and placement rules. Read responses include template, theme, settings and all defaulted properties after normalization.
 */
class SavedFormContent extends JsonSerializableType
{
    /**
     * @var array<FormCaptureBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([FormCaptureBlock::class])]
    public array $blocks;

    /**
     * @var FormCaptureSettings $settings
     */
    #[JsonProperty('settings')]
    public FormCaptureSettings $settings;

    /**
     * @var value-of<SavedFormContentSurface> $surface
     */
    #[JsonProperty('surface')]
    public string $surface;

    /**
     * @var string $template
     */
    #[JsonProperty('template')]
    public string $template;

    /**
     * @var CaptureTheme $theme
     */
    #[JsonProperty('theme')]
    public CaptureTheme $theme;

    /**
     * @var float $version
     */
    #[JsonProperty('version')]
    public float $version;

    /**
     * @param array{
     *   blocks: array<FormCaptureBlock>,
     *   settings: FormCaptureSettings,
     *   surface: value-of<SavedFormContentSurface>,
     *   template: string,
     *   theme: CaptureTheme,
     *   version: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'];
        $this->settings = $values['settings'];
        $this->surface = $values['surface'];
        $this->template = $values['template'];
        $this->theme = $values['theme'];
        $this->version = $values['version'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
