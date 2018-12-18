
{#render  the widget admin menu partial view#}
{{ partial("shared/_adminWidgetMenu") }}

<h1 class="orange">All Articles</h1><br>

{% if articles is defined and articles | length > 0 %}
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Publication Date</th>
            <th>Article</th>
        </tr>
        </thead>
        <tbody>
        {% for article in articles %}
            <tr class="articleTableRow" data-articleId="{{ article.id }}">
                <td>{{ article.creationDate }}</td>
                <td>{{ article.title }}</td>

            </tr>
        {% endfor %}

        </tbody>
    </table>

{% endif %}

 {% if articles | length > 0 %}
     <p>{{ articles | length }} articles in total.</p>
 {% else %}
     <p>No articles found</p>
 {% endif %}

<a href="create">Add a New Article</a>
