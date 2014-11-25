<div class="container">
    {{ partial ('pm/pm_menu') }} 
    <hr>
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/pm">Inbox</a></li>
                <li><a href="/pm/starred">Starred</a></li>
                <li><a href="/pm/important">Important</a></li>
                <li><a href="/pm/sent">Sent Mail</a></li>
                <li><a href="/pm/drafts">Drafts</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
			<div id="mailbox-content" class="mailbox-content"><div id="compose-view" class="compose-view">
				<form id="email-compose" class="form-horizontal form-email-compose" method="POST" enctype="multipart/form-data">
					<div class="control-group">
							<input type="text" id="input-to" placeholder="To" class="input-transparent form-control" value="">
					</div>
					<br />
					<div class="control-group">
							<input type="text" id="input-subject" placeholder="Subject" class="input-transparent form-control" value="">
					</div>
					<br />
					<div class="control-group">
				            <textarea rows="12" class="input-transparent" id="pm-body" style="display: none;"></textarea>
					</div>
					<br />
					<div class="control-group">
                       <div class="fileupload fileupload-new" data-provides="fileupload">
						<span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
						<span class="fileupload-exists">Change</span>         <input type="file" /></span>
						<span class="fileupload-preview"></span>
						<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
					  </div>
					</div>
					<br>
					<div class="control-group">
						<button type="submit" id="compose-send-button" class="btn btn-sm btn-primary">&nbsp;&nbsp;&nbsp;Send&nbsp;&nbsp;&nbsp;</button>
						<button type="button" id="compose-save-button" class="btn btn-sm btn-transparent">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
						<button type="reset" id="compose-discard-button" class="btn btn-sm btn-transparent">Discard</button>
					</div>
				</form>
</div></div>
			
			
        </div>
    </div>
</div>