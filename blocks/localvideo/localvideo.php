<!-- Video dgdfgdfgPlayer -->
<?php

// Source
$vidfile = $block->vidfile()->tofile();
$posterfile = $block->vidposter()->tofile();


// Video Contols
$vidoptions = [
    'poster'        => $posterfile->url(),
    'class'         => 'videosrc',
    'preload'       => 'metadata',
    'controls'      => $block->controls()->toBool() ? 'true' : null,
    'playsinline'   => $block->playsinline()->toBool() ? 'true' : null,
    'autoplay'      => $block->autoplay()->toBool() ? 'true' : null,
    'muted'         => $block->mute()->toBool() ? 'true' : null,
    'loop'          => $block->loop()->toBool() ? 'true' : null
];


$posterimage = Html::tag('img', null, ['src' => $posterfile->url() ]);

$videsourcetag = Html::tag('source', null, ['src' => $vidfile->url(), 'type' => $vidfile->mime() ]);
$videsourcetag .= Html::tag('a', [$posterimage], ['href' => $vidfile->url() ]);
$vidtag = Html::tag('video', [$videsourcetag], $vidoptions);
$player = Html::tag('figure', [$vidtag], ['class' => 'video']);

echo $player;

?>










