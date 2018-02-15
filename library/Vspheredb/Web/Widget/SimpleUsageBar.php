<?php

namespace Icinga\Module\Vspheredb\Web\Widget;

use dipl\Html\Html;
use dipl\Html\BaseElement;

class SimpleUsageBar extends BaseElement
{
    protected $tag = 'div';

    protected $defaultAttributes = [
        'class' => 'disk-usage compact',
        'data-base-target' => '_next',
        'style' => 'display: inline-block; width: 6em;'
    ];

    /** @var int */
    protected $used;

    /** @var int */
    protected $total;

    /** @var string */
    protected $title;

    public function __construct($used, $total, $title)
    {
        $this->used = $used;
        $this->total = $total;
        $this->title = $title;
    }

    protected function assemble()
    {
        $usedPercent = $this->used / $this->total;
        $this->add(Html::tag('span', [
            'href' => '#',
            'style' => sprintf(
                'display: block; width: %0.3F%%; background-color: rgba(70, 128, 255, 0.75); height: 100%%;',
                $usedPercent * 100
            ),
            'title' => $this->title
        ]));
    }
}
