<?php

@include_once __DIR__ . '../../../vendor/autoload.php';

return [
 
        'vidembed' => [
            'attr' => [
              'width',
              'height',
              'poster',
              'caption',
              'title',
              'class',
              'vidclass',
              'caption',
              'preload',
              'controls',
              'snippet'
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
    
              if(empty($alt)) $alt = pathinfo($tag->video, PATHINFO_FILENAME);
    
              $width      = $tag->width;
              $height     = $tag->height;
              $preload    = $tag->preload;
              $controls   = $tag->controls;
    
              // Set some defaults
              if(!isset($tag->width))  $width       = 400;
              if(!isset($tag->height)) $height      = 300;
              if(!isset($tag->preload))  $preload   = 'preload';
              if(!isset($tag->controls)) $controls  = 'controls';
    
              $args = array(
                'video'     => $file,
                'videourl'  => $fileurl,
                'poster'    => $poster,
                'posterurl' => $posterurl,
                'width'     => $width,
                'height'    => $height,
                'class'     => $tag->class,
                'vidclass'  => $tag->vidclass,
                'preload'   => $preload,
                'caption'   => $caption,
                'controls'  => $controls,
                'title'     => $title,
                'alt'       => $alt,
                'mime'      => $filemime,
                'modified'  => $filemod
    
              );
    
              $snippet  = ($snip) ? $snip : 'html5video';
              $video = snippet($snippet, $args, true);
    
              return $video;
            }
          ]
  

];
