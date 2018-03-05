<div class="well row">
  <div class="col-md-6 col-md-offset-3">

    <h2 class="text-center text-muted">Formulario de Uploads</h2>

    <?= $this->getContent() ?>

    <?= $this->tag->form(['class' => 'form-post', 'enctype' => 'multipart/form-data']) ?>
      <input type="hidden" id="token" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>">

      <div class="col-md-12">
        <?= $form->label('upload') ?>
        <?= $form->render('upload') ?>
      </div>

      <div class="col-md-12">
        <?= $form->label('users') ?>
        <?= $form->render('users') ?>
      </div>

      <div class="col-md-12" style="margin-top : 20px">
        <?= $form->render('Upload') ?>
      </div>
    </form>
  </div>
</div>
