<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\TextArea,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Identical,
    Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;

class ArticlesForm extends Form
{
  public function initialize()
  {
    $name = new Text('name', [
      'placeholder' => 'Nombre',
      'class'       => 'form-control'
    ]);
    $name->addValidators([
      new PresenceOf([
        'message' => 'El Nombre es requerido'
      ])
    ]);
    $name->setLabel('Nombre');
    $this->add($name);

    $description = new TextArea('description', [
      'placeholder' => 'descripción',
      'class'       => 'form-control'
    ]);
    $description->addValidators([
      new PresenceOf([
        'message' => 'La descripción del artículo es requerido'
      ])
    ]);
    $description->setLabel('Descripción');
    $this->add($description);

    $price = new Text('price', [
      'placeholder' => 'Precio',
      'class'       => 'form-control'
    ]);
    $price->addValidators([
      new PresenceOf([
        'message' => 'El precio es requerido'
      ])
    ]);
    $price->setLabel('Precio');
    $this->add($price);

    $users = new Select('users', Users::find(), [
      'using' => ['id', 'email'],
      'class' => 'form-control'
    ]);
    $users->setLabel('Usuario');
    $this->add($users);

    $this->add(new Submit("Article", [
      "class" => "btn btn-success btn-block"
    ]));
  }
}
