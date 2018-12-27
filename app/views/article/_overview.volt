{% if articles is defined %}

    <div class="col-md-10">
        {% for article in articles %}

            {#The date and title#}
            {#<div class="row">#}
                {#<div class="col-md-2">#}
                    {#<span class="article-date"> {{ article.getCreationDate()}}</span>#}
                {#</div>#}
                {#<div class="col-md-8">#}
                    {#{{ link_to('article/detail/' ~ article.id, article.title, 'class' : 'article-title') }}#}
                {#</div>#}
            {#</div>#}

            {#The date and title#}
            <div class="col-md-10">
                <span id="article-date-overview" class="article-date" > {{ article.getCreationDate()}}</span>

                {{ link_to('article/detail/' ~ article.id, article.title, 'class' : 'article-title') }}
            </div>


            {#The summary#}
            <div class="row">
                <div class="col-md-8 offset-2">
                    <p class="article-summary">
                        {{ article.summary }}
                    </p>
                </div>
            </div>
        {% endfor %}
    </div>

    {#If there are no atricles#}
    {% else %}
    <h5>There are no articles available...</h5>

{% endif %}