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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">

                    {% if pm == null %}
                    <br>
                          <div class="alert alert-info">No Messages</div>
                    {% else %}
                          {% for pms in pm.items %}
						  	<a href="/pm/show/{{ pms.privID }}" class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input class="checkbox1" type="checkbox" name="check[]" value="{{ pms.privID }}">
                                    </label>
                                </div>
 <span class="glyphicon glyphicon-star-empty"></span>
 <span class="name  label label-success" style="min-width: 120px; display: inline-block;">{{ pms.name }}</span> 
 <span class="">{% if pms.read == '0' %}<b>{{ pms.subject }}</b>{% else %} {{ pms.subject }} {% endif %}</span>
  <span class="text-muted" style="font-size: 11px;"><?php echo substr($pms->message,0,20); ?></span> 
  <span class="badge">{{ pms.date }}</span> 
  <span class="pull-right"><span class="glyphicon glyphicon-paperclip"></span></span></a>
						  {% endfor %}
				    {% endif %}   
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>