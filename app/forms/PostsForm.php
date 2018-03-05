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

class PostsForm extends Form
{
  public function initialize()
  {
    $title = new Text('title', [
      'placeholder' => 'Titulo',
      'class' => 'form-control'
    ]);
    $title->addValidators([
      new PresenceOf([
        'message' => 'El titulo es requerido'
      ])
    ]);
    $title->setLabel('Titulo');
    $this->add($title);

    $content = new TextArea('content', [
      'placeholder' => 'Contenido del post',
      'class' => 'form-control'
    ]);

    $content->addValidators([
      new PresenceOf([
        'message' => 'El contenido del post es requerido'
      ])
    ]);
    $content->setLabel('Contenido');
    $this->add($content);

    $users = new Select('users', Users::find(), [
      'using' => ['id', 'email'],
      'class' => 'form-control'
    ]);
    $users->setLabel('Usuario');
    $this->add($users);

    $this->add(new Submit("Post", [
      "class" => "btn btn-success btn-block"
    ]));
  }

}
