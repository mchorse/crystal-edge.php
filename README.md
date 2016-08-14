# Crystal Edge

Simple light-weight static website engine wriiten in PHP. Don't use yet, it's 
not tested and still in development. This is written on iPad in Notes app (seriously).

## Example

```php
<?php

/* Crystal Edge's imports */
use crystal\edge\FileSystemExport;
use crystal\edge\FileSystemExtract;
use crystal\edge\Site;
/* Utils */
use crystal\edge;

/* Filters */
$read = apply('path', 'content', 'file_get_contents');
$parsedown = apply('content', 'output', [new Parsedown, 'text']);

/* Website */
$site = new Site(new FileSystemExtract('./content/'));
$site->filters = [$read, $parsedown];

/* Build it */
(new FileSystemExport($site, './build/')->export();
```

## License

Licensed under MIT license, see [LICENSE](./LICENSE) file.
