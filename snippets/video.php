<?php
$posterimage = Html::tag('img', null, ['src' => $posterurl, 'alt' => $alt]);
$videsourcetag = Html::tag('source', null, ['src' => $videourl, 'type' => $mime]);
$videsourcetag .= Html::tag('a', [$posterimage], ['href' => $videourl]);
$vidtag = Html::tag('video', [$videsourcetag], ['poster' => $posterurl, 'width' => $width, 'height' => $height, 'controls' => $controls, 'preload' => $preload, 'class' => $vidclass]);

if($caption) {
  $cap = Html::tag('figcaption', [$caption]);
} else {
  $cap = null;
}

$vidtag .= $cap;
$player = Html::tag('figure', [$vidtag], ['class' => $class]);
?>

<!-- Video Player -->
<?= $player ?>
