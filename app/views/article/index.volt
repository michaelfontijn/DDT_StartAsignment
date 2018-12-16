<h4 class="yellow">Widget News Admin</h4>
<p>You are logged in as {TODO}. <a href="user/logout">Log out</a></p>
<hr>

<h1 class="orange">All Articles</h1><br>

{% if articles is defined and articles | length > 0 %}
    <table class="table table-striped">
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
{#{{ link_to(['for':'/article/create', 'param':'param'], 'Edit') }}#}
{#{{ link_to(['products/edit/10', 'Edit', 'class':'edit-btn']) }}#}