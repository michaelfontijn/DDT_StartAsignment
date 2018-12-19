
{# Setting a csrf token in a form#}
<input type="hidden" name="<?=$this->security->getTokenKey()?>" value="<?=$this->security->getToken()?>"/>

<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label">Article Title</label>
    <div class="col-md-10">
        {% if title is defined  %}
            {{ text_field('title', 'size' : 32, 'class' : 'form-control','value' :title ) }}
        {% else %}
            {{ text_field('title', 'size' : 32, 'class' : 'form-control') }}
        {% endif %}
    </div>
</div>

<div class="form-group row">
    <label for="summary" class="col-md-2 col-form-label">Article Summary</label>
    <div class="col-md-10">
        {% if summary is defined  %}
            {{ text_area('summary', 'size': 32, 'class' : 'form-control', 'value' : summary) }}
        {% else %}
            {{ text_area('summary', 'size': 32, 'class' : 'form-control') }}
        {% endif %}
    </div>
</div>

<div class="form-group row">
    <label for="content" class="col-md-2 col-form-label">Article Content</label>
    <div class="col-md-10">
        {% if content is defined  %}
            {{ text_area('content', 'size': 32, 'class' : 'form-control', 'value' : content) }}
        {% else %}
            {{ text_area('content', 'size': 32, 'class' : 'form-control') }}
        {% endif %}
    </div>
</div>

<br>
