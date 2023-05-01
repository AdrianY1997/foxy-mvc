<?php

declare(strict_types=1);

namespace FoxyMVC\Lib\Sly\Patterns;

use FoxyMVC\Lib\Sly\Interfaces\TemplatePatterns;

class ConditionalPatterns implements TemplatePatterns {
    public function getPatterns() {
        return [
            // '/@if\s*\(((?:[^()]+|(?R))*)\)/'
            '/@if\s*\(\s*([^)]*)\s*\)\s*(.*?)\s*@endif/s' => function ($matches) {
                return '<?php if (' . $matches[1] . ') { ?> ' . $matches[2] . ' <?php } ?>';
            },
            '/@isset\s*\(\s*(.+?)\s*\)\s*(.*?)\s*@endisset/s' => function ($matches) {
                return '<?php if (isset(' . $matches[1] . ')) { ?> ' . $matches[2] . ' <?php } ?>';
            }
        ];
    }
}