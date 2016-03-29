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

## Basic usage (Slim 3)

Extend basic Form and within the setUp method set the form fields

```php
use Forms\From;
use Forms\Validators\Required;

class LoginForm extends Form
{
    protected function setUp()
    {
        $this->fields = [
            (new TagOpen(['class' => "wrapper"])),
            (new TextInput("identifier"))
                ->setLabel("User / Email")
                ->setAutocomplete("off")
                ->setDecoratorClass("input-field col s12")
                ->setValidators([
                    new Required(),
                ]),
            (new PasswordInput("password"))
                ->setLabel("Password")
                ->setDecoratorClass("input-field col s12")
                ->setValidators([
                    new Required(),
                ]),
            (new SubmitButton())
                ->setDecoratorClass("input-field col s12")
                ->setClass("btn yellow right")
                ->setText("Login"),
            (new TagClose(),
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
    /**
     * You can pass to the form the method action and the CSRF name
     * by default the form uses
     * - $action=""
     * - $method="POST"
     * - $csrf=['csrf_name', 'csrf_value']
     */
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

    // Render Form with validation
    echo $form->render($request);

    return $response;
}

```


## Contributing

Please file issues under GitHub, or submit a pull request if you'd like to directly contribute.

## Running tests

Tests are run with phpunit. Run ./vendor/bin/phpunit to run tests.