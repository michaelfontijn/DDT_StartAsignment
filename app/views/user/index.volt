<div id="loginContainer" class="col-md-6 offset-3">

    {#If there are validation errors, show them#}
    {% if  validationErros is defined and validationErrors | length > 0 %}
        <div id="valErrorContainer">
            {% for error in validationErrors %}
                <p>{{ error }}</p>
            {% endfor  %}
        </div>
    {% endif  %}

    {{ form('user/login') }}
    <div class="form-group row">
        <label for="username" class="col-md-2 col-form-label">Username</label>
        <div class="col-md-10">
            {{ text_field('username', 'size' : 32, 'class' : 'form-control') }}
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-2 col-form-label">Password</label>
        <div class="col-md-10">
            {{ password_field('password', 'size' : 32, 'class' : 'form-control') }}
        </div>
    </div>

    {{ submit_button('Login!', 'class' : 'btn btn-custom col-md-4 offset-4 btnLogin') }}
    {{ end_form() }}

</div>
