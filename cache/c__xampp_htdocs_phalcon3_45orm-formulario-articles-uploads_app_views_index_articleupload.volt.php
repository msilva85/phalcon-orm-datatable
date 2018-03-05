<div class="well row">
  <div class="col-md-8 col-md-offset-2">

    <h3 class="text-center text-muted">Formulario de artículos</h3>

    <?= $this->getContent() ?>

    <?= $this->tag->form(['class' => 'form-post']) ?>
      <input type="hidden" id="token" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>">

      <div class="col-md-12">
        <?= $form->label('articles') ?>
        <?= $form->render('articles') ?>
      </div>

      <div class="col-md-12">
        <?= $form->label('uploads') ?>
        <?= $form->render('uploads') ?>
      </div>

      <div class="col-md-12" style="margin-top : 20px">
        <?= $form->render('ArticleUpload') ?>
      </div>
    </form>
  </div>
</div>
