<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\File,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Identical,
    Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;

class UploadsForm extends Form
{
  public function initialize()
  {
    $file = new File('upload', [
      'placeholder' => 'Archivo',
      'class'       => 'form-control'
    ]);
    $file->setLabel('Archivo');
    $this->add($file);

    $users = new Select('users', Users::find(), [
      'using' => [ 'id', 'email'],
      'class' => 'form-control'
    ]);
    $users->setLabel('Usuario');
    $this->add($users);

    $this->add(new Submit('Upload', [
      'class' => 'btn btn-success btn-block'
    ]));
  }
}
