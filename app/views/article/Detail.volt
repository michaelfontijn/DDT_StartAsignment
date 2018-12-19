
<div class="col-md-10">
    <h1 class="orange">{{ article.title }}</h1>
    <br>
    <p>{{ article.content }}</p>

    <p class="article-date">PUBLISHED ON {{ article.getCreationDate() }}</p>

    {{ link_to('index' , 'Return to Homepage') }}
</div>

