
<?php
if(empty($top_nav_background)) $top_nav_background = '';
if(empty($top_nav_color)) $top_nav_color = '';
if(empty($button_background)) $button_background = '';
if(empty($button_color)) $button_color = '';
if(empty($border)) $border = '';
if(empty($background)) $background = '';
if(empty($color)) $color = '';
if(empty($positive)) $positive = '';
if(empty($negative)) $negative = '';
if(empty($chart_grid)) $chart_grid = '';
if(empty($chart_line)) $chart_line = '';
$data = array(
    'top-nav-background' => $top_nav_background,
    'top-nav-color' => $top_nav_color,
    'button-background' => $button_background,
    'button-color' => $button_color,
    'border' => $border,
    'background' => $background,
    'color' => $color,
    'positive' => $positive,
    'negative' => $negative,
    'chart-grid' => $chart_grid,
    'chart-line' => $chart_line,
);


?>
<link rel="stylesheet" href="//static.optionlift.com/assets/styles/themes/custom/?<?php echo http_build_query($data);?>" type="text/css" media="all">