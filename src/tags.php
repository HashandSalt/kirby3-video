<?php

@include_once __DIR__ . '../../../vendor/autoload.php';

return [
 
        'vidembed' => [
            'attr' => [
              'autoplay',
              'caption',
              'caption',
              'class',
              'controls',
              'height',
              'loop',
              'playsinline',
              'poster',
              'preload',
              'snippet',
              'title',
              'vidclass',
              'width',
            ],
            'html' => function($tag) {
    
              $caption      = $tag->caption;
    
              $file         = $tag->parent()->file($tag->value);
              $fileurl      = $file ? $file->url() : '';
              $filemime     = $file ? $file->mime() : '';
              $filemod      = $file ? $file->modified('%d/%m/%Y', 'strftime') : '';
    
    
              $poster       = $tag->parent()->file($tag->poster);
              $posterurl    = $poster ? $poster->url() : '';
    
              $snip         = $tag->snippet;
    
              $alt          = $tag->alt;
              $title        = $tag->title;
    
              if($file) {
                if(empty($alt) and $file->alt() != '') {
                  $alt = $file->alt();
                }
                if(empty($title) and $file->title() != '') {
                  $title = $file->title();
                }
              }
    
              if(empty($alt)) $alt = $file->name();
    
              $width       = $tag->width;
              $height      = $tag->height;
              $preload     = $tag->preload;
              $controls    = $tag->controls;
              $playsinline = $tag->playsinline;
              $autoplay    = $tag->autoplay || false;
              $muted       = $tag->autoplay || false;
              $loop        = $tag->loop || false;
    
              // Set some defaults
              if(!isset($tag->width))  $width       = 400;
              if(!isset($tag->height)) $height      = 300;
              if(!isset($tag->preload))  $preload   = 'preload';
              if(!isset($tag->controls)) $controls  = true;
              if(!isset($tag->playsinline)) $playsinline  = true;
              $controls   = filter_var($controls, FILTER_VALIDATE_BOOLEAN);
              $playsinline   = filter_var($playsinline, FILTER_VALIDATE_BOOLEAN);
    
              $args = array(
                'alt'         => $alt,
                'autoplay'    => $autoplay,
                'caption'     => $caption,
                'class'       => $tag->class,
                'controls'    => $controls,
                'height'      => $height,
                'loop'        => $loop,
                'mime'        => $filemime,
                'modified'    => $filemod,
                'muted'       => $muted,
                'playsinline' => $playsinline,
                'poster'      => $poster,
                'posterurl'   => $posterurl,
                'preload'     => $preload,
                'title'       => $title,
                'vidclass'    => $tag->vidclass,
                'video'       => $file,
                'videourl'    => $fileurl,
                'width'       => $width,
              );
    
              $snippet  = ($snip) ? $snip : 'html5video';
              $video = snippet($snippet, $args, true);
    
              return $video;
            }
          ]
  

];
