<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Identical,
    Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;

class UsersForm extends Form
{
  public function Initialize()
  {

    $username = new Text('username', [
      "placeholder" => "Username",
      "class" => "form-control"
    ]);

    $username->addValidators([
      new PresenceOf([
        'message' => "El Username es requerido"
      ])
    ]);

    $username->setLabel('Username');
    $this->add($username);

    $email = new Text('email', [
      "placeholder" => "Email",
      "class" => "form-control"
    ]);

    $email->addValidators([
      new PresenceOf([
        "message" => "El email es requerido"
      ]),
      new Email([
        "message" => "El email no es Válido"
      ]),
      new UniquenessValidator([
        "model" => new Users(),
        "message" => "El :field debe ser único"
      ])
    ]);

    $email->setLabel("Email");

    $this->add($email);

    $password = new Password("password", [
      "placeholder" => "Password",
      "class" => "form-control"
    ]);

    $password->addValidators([
      new PresenceOf([
        "message" => "El password es requerido"
      ])
    ]);

    $password->setLabel("Password");

    $this->add($password);

    $this->add(new Submit("Registro", [
      "class" => "btn btn-success btn-block"
    ]));
  }
}
