# Crystal Edge

Simple light-weight static website engine wriiten in PHP. Don't use yet, it's 
not tested and still in development. This is written on iPad in Notes app (seriously).

## Example

```php
<?php

/* Crystal Edge's imports */
use crystal\edge\FileSystemExtract;
use crystal\edge\Site;

/* Filters */
$parsedown = function($pages)
{
  return array_map(function($data)
  {
    $data['content'] = Parsedown::instance()->text($data['content']);
    
    return $data;
  }, $pages);
};

/* Website */
$site = new Site(new FileSystemExtract('./content/'));
$site->filters = [
  $parsedown
];

/* Build code */
foreach($site->process() as $path => $content)
{
  @mkdir("./build/$path", 0777, true);
  file_put_content("./build/$path", $content['output']);
}

```

## License

Licensed under MIT license, see [LICENSE](./LICENSE) file.
