# Single Crawler

> Single Crawler is a single method of crawller sites.

## Beta Version
> 0.4

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

> #### General Get html between tag by tag and class or id
 ```php
use Lenonleite\SimpleCrawler;
$html = file_get_contents( 'teste.html' );
$general = new SimpleCrawler\General();
$tag = 'div';
$name_class_or_id = 'sidebar';
$result = $general->get_html_between_tag_attr_id_or_class( $html, $tag, $name_class_or_id );
```
*Result*
```php
array(1) {
  [0]=>
  string(60) "<div id="sidebar" class="right internal">
    Sidebar
</div>"

```

> #### General Get on parts os structure tags
```php
use Lenonleite\SimpleCrawler;
$general = new SimpleCrawler\General();
$tag = '<div id="header" class="all">';
$result = $general->get_attribute_tag( $tag );
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
> #### PHP / Methods Get data of Methods on Html.
```php
use Lenonleite\SimpleCrawler;
$html_php = file_get_contents( 'teste_php_methods.html' );
$php = new SimpleCrawler\Php\Methods();
$result = $php->get_parameters( $html_php );
```
*Result*
```php
array(3) {
  [0]=>
  array(6) {
    ["type_methdd"]=>
    string(6) "public"
    ["static"]=>
    string(0) ""
    ["name_method"]=>
    string(6) " error"
    ["atributes"]=>
    array(1) {
      [0]=>
      string(8) "$message"
    }
    ["internal_context"]=>
    string(87) "
$this->CleanUp();
if (!isset($this->info['error'])) {
$this->info['error'] = array();
"
    ["all_context"]=>
    string(121) "public function error($message) {
$this->CleanUp();
if (!isset($this->info['error'])) {
$this->info['error'] = array();
}"
  }
  [1]=>
  array(6) {
    ["type_methdd"]=>
    string(0) ""
    ["static"]=>
    string(0) ""
    ["name_method"]=>
    string(8) " warning"
    ["atributes"]=>
    array(1) {
      [0]=>
      string(8) "$message"
    }
    ["internal_context"]=>
    string(51) "
$this->info['warning'][] = $message;
return true;
"
    ["all_context"]=>
    string(81) "
function warning($message) {
$this->info['warning'][] = $message;
return true;
}"
  }
  [2]=>
  array(6) {
    ["type_methdd"]=>
    string(7) "private"
    ["static"]=>
    string(7) "static "
    ["name_method"]=>
    string(8) " warning"
    ["atributes"]=>
    array(2) {
      [0]=>
      string(8) "$message"
      [1]=>
      string(6) "$error"
    }
    ["internal_context"]=>
    string(51) "
$this->info['warning'][] = $message;
return true;
"
    ["all_context"]=>
    string(102) "private static function warning($message,$error) {
$this->info['warning'][] = $message;
return true;
}"
  }
}

```

> #### HTML Get all urls on Html.
```php
use Lenonleite\SimpleCrawler;
$html_txt = '<a href="https://www.w3schools.com">Visit W3Schools</a>';
$html = new SimpleCrawler\Html();
$result = $html->get_parameters( $html_txt );
```
*Result*
```php
array(1) {
  [0]=>
  string(25) "https://www.w3schools.com"
}
```

> #### LOGIN Get data about forms.
```php
use Lenonleite\SimpleCrawler;
$html = file_get_contents( 'teste.html' );
$login = new SimpleCrawler\Login();
$result = $login->get_forms( $html );
```
*Result*
```php
array(1) {
  [0]=>
  array(3) {
    ["html"]=>
    string(280) "<form action="/action_page.php" method="POST">
        First name:<br>
        <input type="text" name="firstname" value="Mickey"><br>
        Last name:<br>
        <input type="text" name="lastname" value="Mouse"><br><br>
        <input type="submit" value="Submit">
    </form>"
    ["fields"]=>
    array(2) {
      ["tags"]=>
      array(3) {
        [0]=>
        string(55) "<input type="text" name="firstname" value="Mickey"><br>"
        [1]=>
        string(57) "<input type="text" name="lastname" value="Mouse"><br><br>"
        [2]=>
        string(36) "<input type="submit" value="Submit">"
      }
      ["tags_atributes"]=>
      array(3) {
        [0]=>
        array(3) {
          ["full"]=>
          string(51) "<input type="text" name="firstname" value="Mickey">"
          ["key"]=>
          string(5) "input"
          ["value"]=>
          string(43) "type="text" name="firstname" value="Mickey""
        }
        [1]=>
        array(3) {
          ["full"]=>
          string(49) "<input type="text" name="lastname" value="Mouse">"
          ["key"]=>
          string(5) "input"
          ["value"]=>
          string(41) "type="text" name="lastname" value="Mouse""
        }
        [2]=>
        array(3) {
          ["full"]=>
          string(36) "<input type="submit" value="Submit">"
          ["key"]=>
          string(5) "input"
          ["value"]=>
          string(28) "type="submit" value="Submit""
        }
      }
    }
    ["form"]=>
    array(2) {
      ["tags"]=>
      array(1) {
        [0]=>
        string(46) "<form action="/action_page.php" method="POST">"
      }
      ["tags_atributes"]=>
      array(1) {
        [0]=>
        array(3) {
          ["full"]=>
          string(46) "<form action="/action_page.php" method="POST">"
          ["key"]=>
          string(4) "form"
          ["value"]=>
          string(39) "action="/action_page.php" method="POST""
        }
      }
    }
  }
}


```