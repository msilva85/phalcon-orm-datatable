
{% extends "templates/index.volt" %}

{% block content %}

<div class="well row">
  <div class="col-md-8 col-md-offset-2">

    <h3 class="text-center text-muted">Formulario de posts</h3>

    {{ content() }}

    {{ form('class' : 'form-post') }}
      <input type="hidden" id="token" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">

      <div class="col-md-12">
        {{ form.label('title') }}
        {{ form.render('title') }}
      </div>

      <div class="col-md-12">
        {{ form.label('content') }}
        {{ form.render('content') }}
      </div>

      <div class="col-md-12">
        {{ form.label('users') }}
        {{ form.render('users') }}
      </div>

      <div class="col-md-12">
        {{ form.render('Post') }}
      </div>
    </form>
  </div>
</div>

{% endblock %}
