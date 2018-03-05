<div class="well row">
  <div class="col-md-8 col-md-offset-2">

    <h3 class="text-center text-muted">Formulario de posts</h3>

    <?= $this->getContent() ?>

    <?= $this->tag->form(['class' => 'form-post']) ?>
      <input type="hidden" id="token" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>">

      <div class="col-md-12">
        <?= $form->label('title') ?>
        <?= $form->render('title') ?>
      </div>

      <div class="col-md-12">
        <?= $form->label('content') ?>
        <?= $form->render('content') ?>
      </div>

      <div class="col-md-12">
        <?= $form->label('users') ?>
        <?= $form->render('users') ?>
      </div>

      <div class="col-md-12">
        <?= $form->render('Post') ?>
      </div>
    </form>
  </div>
</div>
