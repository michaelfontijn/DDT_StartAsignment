{#A geneneric component to output flash messages that are stored in the flashSession#}
{% if flashSession.has("message")%}
    <div class="flash-message-group">
        {{ flashSession.output() }}
    </div>
{% endif %}