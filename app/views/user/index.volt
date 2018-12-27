

{#The unauthorized message in from the SecurityPlugin in case the user trys to access a resource he may not#}
{% if flashSession.has("error") %}
<div class="unauthorizedError">
    {{ flashSession.output() }}
</div>
{% endif %}

<div id="loginContainer" class="col-md-6 offset-3">

    {#If there are validation errors, show them#}
    {% if  validationErrors is defined and validationErrors | length > 0 %}
        <div id="valErrorContainer">
            {% for error in validationErrors %}
                <p>{{ error }}</p>
            {% endfor  %}
        </div>
    {% endif  %}

    {#the login form    #}
    {{ form('user/login') }}

    {# Setting a csrf token in a form#}
    <input type="hidden" name="<?=$this->security->getTokenKey()?>" value="<?=$this->security->getToken()?>"/>

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


