<?php
use \DataTables\DataTable;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function registerAction()
    {
      $user = new Users();

      $form = new UsersForm();

      if($this->request->isPost())
      {
        if($this->security->checkToken())
        {
          if($form->isValid($this->request->getPost()) == false)
          {
            foreach($form->getMessages() as $message)
            {
              $this->flash->error($message);
            }
          }
          else
          {
            //Todo guardar el usuario
            $user->username = $this->request->getPost("username");
            $user->email = $this->request->getPost("email");
            $user->password = $this->security->hash($this->request->getPost("password"));

            if($user->save())
            {
              $this->flash->success("El usuario ha sido guardado");
            }
            else
            {
              $this->flash->error("El usuario no se ha podido guardar");
            }
          }
        }else
        {
          $this->flash->error("Error csrf");
        }
      }
      $this->view->form = $form;
    }

    public function postAction()
    {
      $form = new PostsForm();

      //si es una peticion post
      if($this->request->isPost())
      {
        if($this->security->checkToken())
        {
          //si el formulario no pasa la validación que le hemos impuesto
          if($form->isValid($this->request->getPost()) == false)
          {
            //mostramos los mensajes con la clase error que hemos personalizado en los mensajes flash
            foreach($form->getMessages() as $message)
            {
              $this->flash->error($message);
            }
          }
          else
          {
            //paso la validacion
            $post = new Posts();
            $post->title = $this->request->getPost('title');
            $post->content = $this->request->getPost('content');
            $post->userid = $this->request->getPost('users');

            if($post->save())
            {
              $this->flash->success("El Post ha sido guardado");
            }
            else
            {
              $this->flash->error("El Post no se ha podido guardar");
            }
          }
        }
        else
        {
          $this->flash->error("Error csrf");
        }
      }
      $this->view->form = $form;
    }

    public function articleAction()
    {
      $form = new ArticlesForm();

      //si es una peticion post
      if($this->request->isPost())
      {
        if($this->security->checkToken())
        {
          //si el formulario no pasa la validación que le hemos impuesto
          if($form->isValid($this->request->getPost()) == false)
          {
            //mostramos los mensajes con la clase error que hemos personalizado en los mensajes flash
            foreach($form->getMessages() as $message)
            {
              $this->flash->error($message);
            }
          }
          else
          {
            //paso la validacion
            $article = new Articles();
            $article->name = $this->request->getPost('name');
            $article->description = $this->request->getPost('description');
            $article->price = $this->request->getPost('price');
            $article->userid = $this->request->getPost('users');

            if($article->save())
            {
              $this->flash->success("El Post ha sido guardado");
            }
            else
            {
              $this->flash->error("El Post no se ha podido guardar");
            }
          }
        }
        else
        {
          $this->flash->error("Error csrf");
        }
      }
      $this->view->form = $form;
    }

    public function uploadAction()
    {
      $form = new UploadsForm();

      //si es una peticion post
      if($this->request->isPost())
      {
        if($this->security->checkToken())
        {
          //si el formulario no pasa la validación que le hemos impuesto
          if($form->isValid($this->request->getPost()) == false)
          {
            //mostramos los mensajes con la clase error que hemos personalizado en los mensajes flash
            foreach($form->getMessages() as $message)
            {
              $this->flash->error($message);
            }
          }
          else
          {
            //TODO comprobar archivos e insertar en bd
            $validation = new \Phalcon\Validation();
            $file = new Phalcon\Validation\Validator\File([
              'maxSize'      => '2M',
              'messageSize'  => 'El archivo es demasiado pesado, máximo 2MB',
              'allowedTypes' => [ 'image/jpeg', 'image/png'],
              'messageType'  => 'El archivo no tiene una extensión válida',
              'messageEmpty' => 'No has subido ningún archivo'
            ]);

            $validation->add('upload', $file);

            $messages = $validation->validate($_FILES);

            if(count($messages))
            {
              foreach($messages as $message)
              {
                $this->flash->error($message);
              }
            }
            else
            {
              $upload = new Uploads();
              $file = $this->request->getUploadedFiles();

              $upload->name = $file[0]->getName();
              $upload->mime = $file[0]->getRealType();
              $upload->size = $file[0]->getSize();
              $upload->userid = $this->request->getPost("users");

              if($upload->save() && $file[0]->moveTo("img/" . $file[0]->getName()))
              {
                $this->flash->success("El archivo se ha guardado");
              }
              else
              {
                $this->flash->error("El archivo no se ha guardado");
              }
            }
          }
        }
        else
        {
          $this->flash->error("Error csrf");
        }
      }
      $this->view->form = $form;
    }

    public function articleUploadAction()
    {
      $form = new ArticlesUploadsForm();

      //si es una peticion post
      if($this->request->isPost())
      {
        if($this->security->checkToken())
        {
          //si el formulario no pasa la validación que le hemos impuesto
          if($form->isValid($this->request->getPost()) == false)
          {
            //mostramos los mensajes con la clase error que hemos personalizado en los mensajes flash
            foreach($form->getMessages() as $message)
            {
              $this->flash->error($message);
            }
          }
          else
          {
            //se comprueba si existe la relacion y se guarda
            $haveUploads = ArticlesUploads::count([
              'conditions' => 'articleid = ?1 AND uploadid =?2',
              'bind' => [1 => $this->request->getPost('articles'),
                         2 => $this->request->getPost('uploads')]
            ]);

            //si tiene relacion
            if($haveUploads)
            {
              $this->flash->error("La relación ya existe en la base de datos");
            }
            else
            {
              $articlesUploads = new ArticlesUploads();
              $articlesUploads->articleid = $this->request->getPost('articles');
              $articlesUploads->uploadid = $this->request->getPost('uploads');

              if($articlesUploads->save())
              {
                $this->flash->success("La relación ha sido guardada en la base de datos");
              }
              else
              {
                $this->flash->error("La relación no se ha podido guardada en la base de datos");
              }
            }
          }

      }
      else
      {
        $this->flash->error("Error csrf");
      }
    }
    $this->view->form = $form;
  }

  public function listarAction()
  {

  //  if ($this->request->isAjax()) {
        $users = Users::find()->toArray();

        $dataTables = new DataTable();
        $dataTables->fromArray($users)->sendResponse();
    //  }
  }

}
