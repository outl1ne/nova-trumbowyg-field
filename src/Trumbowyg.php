<?php

namespace Outl1ne\NovaTrumbowygField;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Expandable;
use Laravel\Nova\Fields\SupportsDependentFields;

class Trumbowyg extends Field
{
    use Expandable, SupportsDependentFields;

    public $component = 'o1-trumbowyg-field';
    public $fullWidth = true;

    protected $defaultOptions = [
        'resetCss' => true,
        'removeformatPasted' => true,
    ];

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->hideFromIndex();

        // Default options
        $this->options($this->defaultOptions);
    }

    public function options(array $options = [])
    {
        return $this->withMeta(['options' => array_merge($this->defaultOptions, $options)]);
    }

    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'shouldShow' => $this->shouldBeExpanded(),
            'fullWidth' => $this->fullWidth,
        ]);
    }
}
