

{#render  the widget admin menu partial view#}
{{ partial("shared/_adminWidgetMenu") }}

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
        {{ partial("article/_form") }}
        <h1>TODO date field!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h1>
        {{ submit_button('Login!', 'class' : 'btn btn-custom col-md-4 offset-4 btnLogin') }}
    {{ end_form() }}




