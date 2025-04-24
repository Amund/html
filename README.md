![GitHub Tag](https://img.shields.io/github/v/tag/Amund/html)
![Packagist Version](https://img.shields.io/packagist/v/amund/html)

# PHP HTML Library

A PHP library for generating HTML content from PHP arrays.

## Installation

```bash
composer require amund/html
```

## Usage

### Generating single tags

Use the `tag` method to generate single HTML tags.

```php
echo html::tag('div', ['class'=>'test'], 'Hello World');

// Output: <div class="test">Hello World</div>
```

### Rendering HTML content

Use the `render` method to render HTML content from an array.

```php
$data = [
    'tag' => 'div',
    'class' => 'test',
    'content' => [
        'Hello ',
        [
            'tag'=>'b',
            'content'=>'World'
        ],
        ' !',
    ],
];

echo html::render($data);

// Output: <div class="test">Hello <b>World</b> !</div>
```