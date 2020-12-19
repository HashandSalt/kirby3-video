<?php

/**
 *
 * HTML5 Video Tag & Editor Block Plugin for Kirby 3
 *
 * @version   0.0.9
 * @author    James Steel <https://hashandsalt.com>
 * @copyright James Steel <https://hashandsalt.com>
 * @link      https://github.com/HashandSalt/chopper
 * @license   MIT <http://opensource.org/licenses/MIT>
 */

namespace HashAndSalt\Video;

use Kirby\Cms\App;

// Video Tag & Snuippet
// -----------------------------------------------------------------------------
App::plugin('hashandsalt/video', [
  
  'tags'            => require __DIR__ . '/src/tags.php',
  
  'snippets' => [
    'html5video'    => __DIR__ . '/snippets/video.php'
  ]

]);

// Video Block
// -----------------------------------------------------------------------------
App::plugin('hashandsalt/videoblock', [
  'plugin'  => require __DIR__ . '/blocks/localvideo/index.php',
  
  'blueprints' => [
    'blocks/localvideo' => __DIR__ . '/blocks/localvideo/localvideo.yml',
  ],
  
  'snippets' => [
    'blocks/localvideo'    => __DIR__ . '/blocks/localvideo/localvideo.php'
  ]

]);
