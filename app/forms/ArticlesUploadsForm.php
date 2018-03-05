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

class ArticlesUploadsForm extends Form
{
  public function initialize()
  {
    $articles = new Select('articles', Articles::find(), [
      'using' =>  ['id', 'name'],
      'class' =>  'form-control'
    ]);
    $articles->setLabel('Articulo');
    $this->add($articles);

    $uploads = new Select('uploads', Uploads::find(), [
      'using' =>  ['id', 'name'],
      'class' =>  'form-control'
    ]);
    $uploads->setLabel('Archivo');
    $this->add($uploads);

    $this->add(new Submit("ArticleUpload", [
      "class" => "btn btn-success btn-block"
    ]));
  }
}
