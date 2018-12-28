

{#Show validation errors#}
{% if flashSession.has("error") %}
    <div class="validation-error-group">
        {{ flashSession.output() }}
    </div>
{% endif %}

{# Setting a csrf token in a form#}
<input type="hidden" name="<?=$this->security->getTokenKey()?>" value="<?=$this->security->getToken()?>"/>

<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label">Article Title</label>
    <div class="col-md-10">
        {% if article.title is defined  %}
            {{ text_field('title', 'size' : 32, 'class' : 'form-control','value' : article.title ) }}
        {% else %}
            {{ text_field('title', 'size' : 32, 'class' : 'form-control') }}
        {% endif %}
    </div>
</div>

<div class="form-group row">
    <label for="summary" class="col-md-2 col-form-label">Article Summary</label>
    <div class="col-md-10">
        {% if article.summary is defined  %}
            {{ text_area('summary', 'size': 32, 'class' : 'form-control', 'value' : article.summary) }}
        {% else %}
            {{ text_area('summary', 'size': 32, 'class' : 'form-control') }}
        {% endif %}
    </div>
</div>

<div class="form-group row">
    <label for="content" class="col-md-2 col-form-label">Article Content</label>
    <div class="col-md-10">
        {% if article.content is defined  %}
            {{ text_area('content', 'size': 32, 'class' : 'form-control', 'value' : article.content) }}
        {% else %}
            {{ text_area('content', 'size': 32, 'class' : 'form-control') }}
        {% endif %}
    </div>
</div>

<br>
