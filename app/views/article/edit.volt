
<p>TODO section, the dont repeat problem :)</p>

<h1 class="orange">Edit Article</h1>

    {#If there are validation errors, show them#}
    {% if  validationErros is defined and validationErrors | length > 0 %}
        <div id="valErrorContainer">
            {% for error in validationErrors %}
                <p>{{ error }}</p>
            {% endfor  %}
        </div>
    {% endif  %}

    {{ form('article/edit') }}
    <div class="form-group row">
        <label for="title" class="col-md-2 col-form-label">Article Title</label>
        <div class="col-md-10">
            {{ text_field('title', 'size' : 32, 'class' : 'form-control' , 'value' : '{{ title}}') }}
        </div>
    </div>

    <div class="form-group row">
        <label for="summary" class="col-md-2 col-form-label">Article Summary</label>
        <div class="col-md-10">
            {{ text_area('summary', 'size': 32, 'class' : 'form-control', 'value' : '{{ summary}}') }}
        </div>
    </div>

    <div class="form-group row">
        <label for="content" class="col-md-2 col-form-label">Article Content</label>
        <div class="col-md-10">
            {{ text_area('content', 'size': 32, 'class' : 'form-control', 'value' : '{{ content}}') }}
        </div>
    </div>
    {{ submit_button('Login!', 'class' : 'btn btn-custom col-md-4 offset-4 btnLogin') }}
    {{ end_form() }}




