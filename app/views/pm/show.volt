<div class="container">
    {{ partial ('pm/pm_menu') }} 
    <hr>
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="/pm">Inbox</a></li>
                <li><a href="/pm/starred">Starred</a></li>
                <li><a href="/pm/important">Important</a></li>
                <li><a href="/pm/sent">Sent Mail</a></li>
                <li><a href="/pm/drafts">Drafts</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
          {% for messages in message %}
          <h4>{{ messages.subject }} - 
              {% if messages.folder == 0 %} Inbox {% endif %}
              {% if messages.folder == 1 %} Starred {% endif %}
              {% if messages.folder == 2 %} Important {% endif %}
              {% if messages.folder == 3 %} Sent Mail {% endif %}
              {% if messages.folder == 4 %} Drafts {% endif %}</h4>
              
                <div class="email-details-content">
                    <div class="pull-left">
                        <img src="https://secure.gravatar.com/avatar/{{ messages.gravatar }}?s=64&amp;r=pg&amp;d=identicon" class="img-rounded" width="30" height="30">
                        <strong>{{ messages.name }}</strong>
                    </div>
                    <div class="email-date pull-right">
                        {{ messages.date }}
                    </div>
                </div>
                <div style="clear:both;"><br></div>
                <div class="email-body">
                    {{ messages.message }}
                </div>
          
          {% endfor %}
        </div>
    </div>
</div>