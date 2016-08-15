# Crystal Edge

Simple light-weight static website engine wriiten in PHP. Don't use yet, it's 
not tested and still in development. This is written on iPad in Notes app (seriously).

## Example

Basic example:

```php
<?php

/* Crystal Edge's imports */
use crystal\edge\FileSystemExport;
use crystal\edge\FileSystemExtract;
use crystal\edge\Site;

/* Website plugins */

/** Read files from FS */
$read = crystal\edge\apply('path', 'content', 'file_get_contents');

/** Convert markdown into HTML */
$parsedown = crystal\edge\apply('content', 'output', [new Parsedown, 'text']);

/** Add .html extension */
$extension = crystal\edge\remap(function($key)
{
  return "$key.html";
});

/* Website */
$site = new Site(new FileSystemExtract('./content/'));
$site->plugins = [$read, $parsedown, $extension];

/* Build and ship it */
(new FileSystemExport($site, './build/')->export();
```

There's also Wiki available on [GitHub](https://github.com/mchorse/crystal-edge.php/wiki) (on which I'm working).

## License

Licensed under MIT license, see [LICENSE](./LICENSE) file.
