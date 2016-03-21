# Forms
Easy to use & highly customisable PHP package for Form generation and data validation

- Generate HTML forms
- Validate data
- PSR 7 HTTP Message

**Note: This package is under heavy development and is not recommended for production.**

## Installing

Install using Composer.

```json
{
    "require": {
        "eredi93/forms": "0.1"
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
        $this->action = "";
        $this->method = "POST";

        $this->fields = [
            "identifier" => (new Input("identifier"))->setType("text")
                ->setLabel("User / Email")
                ->setAutocomplete("off")
                ->setDecorator("<div class=\"input-field col s12\"> %s </div>")
                ->setValidators([
                    new Required(),
                ]),
            "password" => (new Input("password"))->setType("password")
                ->setLabel("Password")
                ->setNoCallBack()
                ->setDecorator("<div class=\"input-field col s12\"> %s </div></div>")
                ->setValidators([
                    new Required(),
                ]),
            "submit" => (new Button())->setType("submit")
                ->setDecorator("<div class=\"input-field col s12\"> %s </div></div>")
                ->setClass("btn yellow darken-2 waves-effect waves-light")
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
