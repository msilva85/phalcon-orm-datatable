<div class="well row">
  <div class="col-md-8 col-md-offset-2">

    <h3 class="text-center text-muted">Formulario de artículos</h3>

    {{ content() }}

    {{ form('class' : 'form-post') }}
      <input type="hidden" id="token" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">

      <div class="col-md-12">
        {{ form.label('articles') }}
        {{ form.render('articles') }}
      </div>

      <div class="col-md-12">
        {{ form.label('uploads') }}
        {{ form.render('uploads') }}
      </div>

      <div class="col-md-12" style="margin-top : 20px">
        {{ form.render('ArticleUpload') }}
      </div>
    </form>
  </div>
</div>
