<!-- content -->
<style>
    .btn_disabled{
        pointer-events: none;
        background-color: #c3bdbd;
        opacity: 15.9;
    }
</style>
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Add video</h1>
        <form method="post" id="create_quiz" class="form-horizontal border p-2" action="<?php echo EMPLOYEE_ADD_VIDEO_LINK; ?>">                               
            <input type="hidden" name="rmsa_user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_title">Title:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="youtube_video_title" id="youtube_video_title" placeholder="Video Title" required="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_url">URL:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="url" class="form-control" name="youtube_video_url" id="youtube_video_url" placeholder=" Video URL" required="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_recomendation">Recommendation:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="youtube_video_recomendation" id="youtube_video_recomendation" placeholder="Recommendation">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_class">Class:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="youtube_video_class" id="youtube_video_class" placeholder="Class">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_subject">Subject:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="youtube_video_subject" id="youtube_video_subject" placeholder="Subject">
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_topic">Topic:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="youtube_video_topic" id="youtube_video_topic" placeholder="Topic">
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_subtopic">Sub-Topic:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="youtube_video_subtopic" id="youtube_video_subtopic" placeholder="Sub-Topic">
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_language">Language:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" name="youtube_video_language">
                            <option value="English">English</option>                            
                            <option value="Hindi">Hindi</option>                            
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_instructor">Instructor:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="youtube_video_instructor" id="youtube_video_instructor" placeholder="Instructor">
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="youtube_video_description">Description:</label>
                    <div class="col-sm-8 col-xs-12">
                        <textarea class="form-control" name="youtube_video_description"></textarea>
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <div class="row">
                    <script nonce='S51U26wMQz' type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script nonce='S51U26wMQz' type="text/javascript">function enableRegister() {
                        $("#btnRegister").removeClass('btn_disabled');
                        document.getElementById("btnRegister").disabled = false;
                    }</script>
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp"></label>
                    <div class="col-sm-8 col-xs-12">
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableRegister"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="m-auto text-center">    
                    <button type="submit" name="submit" class="btn primary_btn btn_disabled"  disabled="true" id="btnRegister">Submit</button>                    
                </div>
            </div>
        </form>
    </div>
</div>
