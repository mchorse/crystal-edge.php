# Crystal Edge

Simple light-weight static website engine wriiten in PHP. Don't use yet, it's 
not tested and still in development. This is written on iPad in Notes app (seriously).

## Example

Basic example.

This code takes all files in current's path `content` folder, extracts files 
from content folder, reads the content of those files, process them with Parsedown, 
replacing the paths from `.md` to `.html` extension, and builds those files into 
`./build` directory.

```php
<?php

/* Crystal Edge's imports */
use crystal\edge\FileSystemExport;
use crystal\edge\FileSystemExtract;
use crystal\edge\Site;

/* Website plugins */

/** Only markdown files */
$only_md = crystal\edge\filter(function($_, $path)
{
  return preg_match('/\.md$/', $path);
});

/** Read files from FS */
$read = crystal\edge\apply('path', 'content', 'file_get_contents');

/** Convert markdown into HTML */
$parsedown = crystal\edge\apply('content', 'output', [new Parsedown, 'text']);

/** Replace markdown with html extension */
$extension = crystal\edge\remap(function($key)
{
  return str_replace('.md', '.html', $key);
});

/* Website */
$site = new Site(new FileSystemExtract('./content/'));
$site->plugins = [$only_md, $read, $parsedown, $extension];

/* Build and ship it */
(new FileSystemExport($site, './build/'))->export();
```

As the result, you get compiled static website from markdown in html in 
the `build` folder.

There's also Wiki available on [GitHub](https://github.com/mchorse/crystal-edge.php/wiki) 
(on which I'm working).

## License

Licensed under MIT license, see [LICENSE](./LICENSE) file.
