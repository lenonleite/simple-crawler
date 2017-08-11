# Single Crawler

> Single Crawler is a single methods of html's crawler .

## Beta Version
> 0.3

## Install

* composer require lenonleite/simple-crawler

## Usage

> #### Get Tags In Html
```php
use Lenonleite\SimpleCrawler;
$html = file_get_contents( 'teste.html' );
$general = new SimpleCrawler\General();
$result = $general->get_tags( $html );
```
*Result*
```php
array(4) {
  [0]=>
  string(29) "<div id="header" class="all">"
  [1]=>
  string(18) "<div id="content">"
  [2]=>
  string(32) "<div id="sidebar" class="right">"
  [3]=>
  string(17) "<div id='footer'>"
}

```

> #### General Get Atribute Tag
```php
use Lenonleite\SimpleCrawler;
$html = '<div id="header" class="all">';
$general = new SimpleCrawler\General();
$result = $general->get_atribute_tag( $html );

```
*Result*
```php
array(3) {
  ["full"]=>
  string(29) "<div id="header" class="all">"
  ["key"]=>
  string(3) "div"
  ["value"]=>
  string(23) "id="header" class="all""
}

```
> #### General Get Atribute Tag In Array
```php
use Lenonleite\SimpleCrawler;
$html[] = '<div id="header" class="all">';
$html[] = '<div id="content">';
$general = new SimpleCrawler\General();
$result = $general->get_attributes_array_tags( $html );
```
*Result*
```php
array(2) {
  [0]=>
  array(3) {
    ["full"]=>
    string(29) "<div id="header" class="all">"
    ["key"]=>
    string(3) "div"
    ["value"]=>
    string(23) "id="header" class="all""
  }
  [1]=>
  array(3) {
    ["full"]=>
    string(18) "<div id="content">"
    ["key"]=>
    string(3) "div"
    ["value"]=>
    string(12) "id="content""
  }
}
```

> #### General Get Atribute Tag In Array
```php
use Lenonleite\SimpleCrawler;
$html = file_get_contents( 'teste.html' );
$general = new SimpleCrawler\General();
$result = $general->get_data_tags( 'div', $html );
```
*Result*
```php
array(3) {
  ["tags"]=>
  array(4) {
    [0]=>
    string(29) "<div id="header" class="all">"
    [1]=>
    string(18) "<div id="content">"
    [2]=>
    string(32) "<div id="sidebar" class="right">"
    [3]=>
    string(17) "<div id='footer'>"
  }
 ["html"]=>
   string(322) "<html>...</html>"
 ["tags_atributes"]=>
   array(4) {
     [0]=>
     array(3) {
       ["full"]=>
       string(29) "<div id="header" class="all">"
       ["key"]=>
       string(3) "div"
       ["value"]=>
       string(23) "id="header" class="all""
     }
     [1]=>
     array(3) {
       ["full"]=>
       string(18) "<div id="content">"
       ["key"]=>
       string(3) "div"
       ["value"]=>
       string(12) "id="content""
     }
     [2]=>
     array(3) {
       ["full"]=>
       string(32) "<div id="sidebar" class="right">"
       ["key"]=>
       string(3) "div"
       ["value"]=>
       string(26) "id="sidebar" class="right""
     }
     [3]=>
     array(3) {
       ["full"]=>
       string(17) "<div id='footer'>"
       ["key"]=>
       string(3) "div"
       ["value"]=>
       string(11) "id='footer'"
     }
   }
 }

```

> #### General Get Html betwenn Tags By Tag/Attribute/Value
```php
use Lenonleite\SimpleCrawler;
$html = file_get_contents( 'teste.html' );
$general = new SimpleCrawler\General();
$tag       = 'div';
$attribute = 'id';
$value     = 'sidebar';
$result = $general->get_html_between_tag_attr_and_value( $html, $tag, $attribute, $value );
```
*Result*
```php
array(1) {
  [0]=>
  string(51) "<div id="sidebar" class="right">
    Sidebar
</div>"
}

```

> #### General Get Html betwenn Tags By Tag/Value Id or Class
```php
use Lenonleite\SimpleCrawler;
$html = file_get_contents( 'teste.html' );
$general = new SimpleCrawler\General();
$tag    = 'div';
$value  = 'internal';
$result = $general->get_html_between_tag_attr_and_value( $html, $tag, $value );
```
*Result*
```php
array(2) {
  [0]=>
  string(64) "<div id="header" class="all internal">
    <h1>Title</h1>
</div>"
  [1]=>
  string(60) "<div id="sidebar" class="right internal">
    Sidebar
</div>"
}

```

> #### General Get Html betwenn Tags By Tag
```php
use Lenonleite\SimpleCrawler;
$html = file_get_contents( 'teste.html' );
$general = new SimpleCrawler\General();
$tag    = 'div';
$result = $general->get_html_between_tag( $html, $tag );
```
*Result*
```php
array(4) {
  [0]=>
  string(64) "<div id="header" class="all internal">
    <h1>Title</h1>
</div>"
  [1]=>
  string(51) "<div id="content">
    <p> Center right</p>
</div>"
  [2]=>
  string(60) "<div id="sidebar" class="right internal">
    Sidebar
</div>"
  [3]=>
  string(25) "<div id='footer'>

</div>"
}

```

## Future Features

> Find html tags on;y with by id and class names.
> Unitary Testes