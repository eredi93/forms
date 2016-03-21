# Forms
Easy to use & highly customisable PHP package for Form generation and data validation.
Supports [PSR-7 HTTP-Message](http://www.php-fig.org/psr/psr-7/).

- Generate HTML forms
- Validate data
- PSR-7 HTTP-Message

**Note: This package has been developed under Slim3 and is the only Framework supported at the moment.**

## Installing

Install using Composer.

```json
{
    "require": {
        "eredi93/forms": "0.1.*"
    }
}
```

## Basic usage

in the following example will be using Slim 3 for the routing.
extend basic Form and within the setUp method set the form fields and settings
```php
use Forms\From;
use Forms\Validators\Required;

class LoginForm extends Form
{
    protected function setUp()
    {
        $this->fields = [
                    (new TextInput("identifier"))
                        ->setLabel("User / Email")
                        ->setAutocomplete("off")
                        ->setDecorator("<div class=\"input-field col s12\"> %s </div>")
                        ->setValidators([
                            new Required(),
                        ]),
                    (new PasswordInput("password"))
                        ->setLabel("Password")
                        ->setDecorator("<div class=\"input-field col s12\"> %s </div>")
                        ->setValidators([
                            new Required(),
                        ]),
                    (new SubmitButton())
                        ->setDecorator("<div class=\"input-field col s12\"> %s </div>")
                        ->setClass("btn yellow darken-2 waves-effect waves-light right")
                        ->setText("Login"),
                ];
    }
}
```
now that you have your form created instantiate it in the GET controller
```php
public function login(Request $request, Response $response, $args)
{
    // Instantiate Form
    $form = new LoginForm();
    // Render Form
    echo $form->render($request);

    return $response;
}
```
to validate the form in POST controller call the validate method
```php
public function loginPost(Request $request, Response $response, $args)
{
    // Instantiate Form
    $form = new LoginForm();

    // Check validation
    if ($form->validate($request)) {
        /*
        *   Form validation passed log in the user
        */
    }

    // Render Form with validation form
    echo $form->render($request);

    return $response;
}

```

## Contributing

Please file issues under GitHub, or submit a pull request if you'd like to directly contribute.
