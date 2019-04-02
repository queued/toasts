# Easy Toasts Notifications For Your Laravel App

This package is adapted from ```laracasts/flash``` by Jeffrey Way.
Display alerts in a fancy way. Toasts are a great way of informing users of a server side action. 

## Installation

Begin by pulling in the package through Composer.

```bash
composer require queued/toasts
```

This package is made for Bootstrap 4.2 and higher, be sure to include the css and js files on your page.

```html
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
```

```html
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
```

## Usage

Put the necessary script call somewhere in your project. Either in your Blade file, or in your scripts file

```javascript
$('.toast').toast('show');
```

Make sure you include the view in your Blade Template

```html
@include('toast::message')
```

Then, within your controllers, before you perform a redirect, make a call to the `toast()` function.

```php
// example function in your controller
public function create()
{
    toast('Your post was created!');
    return back();
}
```

The toast method accepts the title and level optional arguments :

```php
/*
 * Level can be one of the following:
 *   'success'
 *   'error'
 *   'warning'
 *   'info'
 */
toast('message', 'level', 'title');
```

There are a few quick methods to modify the toast:

- `toast('Message')->success()`: Set the toast theme to "success".
- `toast('Message')->error()`: Set the toast theme to "danger".
- `toast('Message')->warning()`: Set the toast theme to "warning".
- `toast('Message')->info()`: Set the toast theme to "info".
- `toast('Message')->important()`: Add a close button to the toast.
- `toast('Message')->title('Toast title')`: Set the toast title.
- `toast('Message')->time('just now')`: Set the toast time in the right side of the header
- `toast('Message')->error()->important()`: Render a "danger" toast message that must be dismissed.

## Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    @include('toast::message')

    <p>Welcome to my website...</p>
</div>

<!-- exactly in this order -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script defer>
    $('.toast').toast('show');
</script>

</body>
</html>
```

If you need to modify the toast message partials, you can run:

```bash
php artisan vendor:publish --provider="Queued/Toasts/ToastsServiceProvider"
```

```php
toast('Welcome Aboard!');

return home();
```

```php
toast('Sorry! Please try again.')->error();

return home();
```

```php
toast()->overlay('You are now a Laracasts member!', 'Yay');

return home();
```

## Multiple Toasts

Need to flash multiple toasts to the session? No problem.

```php
toast('Message 1');
toast('Message 2')->important();

return redirect('somewhere');
```

## Configuration & personalization

You can publish the configuration file to tweak the position of the toast or the default value for 'autohide'.
```bash
php artisan vendor:publish --provider="Queued\Toasts\ToastServiceProvider" --tag="config"
```

You can publish the view and tweak it if you want!

```bash
php artisan vendor:publish --provider="Queued\Toasts\ToastServiceProvider" --tag="views"
```

The package view will now be located in the `resources/views/vendor/toast/` directory.


