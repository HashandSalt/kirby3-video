# Kirby Video: Embed HTML5 Video

A Kirby tag and snippet for rendering video players inside textareas, and a custom block for use with the new Editor field (Kirby 3.5 required).

****

## Commerical Usage

This plugin is free but if you use it in a commercial project please consider to
- [make a donation 🍻](https://paypal.me/hashandsalt?locale.x=en_GB) or
- [buy a Kirby license using this affiliate link](https://a.paddle.com/v2/click/1129/36141?link=1170)

****

## Installation

### Download

Download and copy this repository to `/site/plugins/kirby3-video`.

### Composer

```
composer require hashandsalt/kirby3-video
```

## Usage

Minimal:

```
(vidembed: yourfile.mp4 poster: yourposter.jpg)
```

You can set your own snippet to roll your own player code:

```
(vidembed: yourfile.mp4 poster: yourposter.jpg snippet: yoursnippet)
```

Look inside the plugin folder for an example snippet.


The following is available to you for use in the snippets:


```php
$video // file object for the video file
$videourl // URL of the video file
$poster // file object for the poster image file
$posterurl // URL of the poster image file
$width // Video Width
$height // Video height
$class // Container class
$vidclass // Video tag class
$preload // Preload attribute
$caption // Set a caption for under the video
$controls // Controls attribute
$title // Video Title
$alt // Poster Alt tag
```

## Editor Block

The plugin now includes and editor block (Kirby 3.5+ Required).

Add `-localvideo` to your list of blocks to use it.

## Known Issues

The plugin makes use of `->file()` - be aware that this uses the first image or first video on the page if the desired one is not found. This is by design.

## License

MIT
