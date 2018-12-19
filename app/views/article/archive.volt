
{#The overview containting the actual articles#}
{{ partial("article/_overview") }}

{#A counter for the amount of articles#}
{% if articles is defined %}
    <p>{{ articles | length }} articles in total.</p>
{% endif %}


{{ link_to("index", "Return to Homepage") }}

