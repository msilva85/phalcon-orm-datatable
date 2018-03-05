<div class="well row">
  <div class="col-md-6 col-md-offset-3">

    <h2 class="text-center text-muted">Formulario de registro</h2>

    <?= $this->getContent() ?>

    <?= $this->tag->form(['class' => 'form-login']) ?>
    <input type="hidden" id="token" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>">

    <div class="col-md-12">
      <?= $form->label('username') ?>
      <?= $form->render('username') ?>
    </div>

    <div class="col-md-12">
      <?= $form->label('email') ?>
      <?= $form->render('email') ?>
    </div>

    <div class="col-md-12">
      <?= $form->label('password') ?>
      <?= $form->render('password') ?>
    </div>

    <div class="col-md-12" style="margin-top : 20px">
      <?= $form->render('Registro') ?>
    </div>
  </div>
</div>
