
{% extends "templates/index.volt" %}

{% block content %}

<div class="well row">
  <div class="col-md-8 col-md-offset-2">

    <h3 class="text-center text-muted">Formulario de artículos</h3>

    {{ content() }}

    {{ form('class' : 'form-post') }}
      <input type="hidden" id="token" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">

      <div class="col-md-12">
        {{ form.label('name') }}
        {{ form.render('name') }}
      </div>

      <div class="col-md-12">
        {{ form.label('description') }}
        {{ form.render('description') }}
      </div>

      <div class="col-md-12">
        {{ form.label('price') }}
        {{ form.render('price') }}
      </div>

      <div class="col-md-12">
        {{ form.label('users') }}
        {{ form.render('users') }}
      </div>

      <div class="col-md-12" style="margin-top : 20px">
        {{ form.render('Article') }}
      </div>
    </form>
  </div>
</div>

{% endblock %}
