<?php

namespace Outl1ne\NovaTrumbowygField;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Expandable;

class Trumbowyg extends Field
{
    use Expandable;

    public $component = 'o1-trumbowyg-field';
    public $fullWidth = true;

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->hideFromIndex();
    }

    public function options(array $options = [])
    {
        return $this->withMeta(['options' => $options]);
    }

    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'shouldShow' => $this->shouldBeExpanded(),
            'fullWidth' => $this->fullWidth,
        ]);
    }
}
