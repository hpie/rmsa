
<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Update Uploaded Files</h1>

        <form method="post" id="frm_general_info" class="form-horizontal border p-2" action="<?php echo FILE_UPDATE_LINK?>/<?=$fileId?>">            
            <h2 class="second-heading">File Information</h2>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="uploaded_file_title">File Title:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$file_data['uploaded_file_title']?>" name="uploaded_file_title" id="uploaded_file_title" placeholder="Enter File Name ">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="uploaded_file_desc">File Description:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$file_data['uploaded_file_desc']?>" name="uploaded_file_desc" id="uploaded_file_desc" placeholder="Enter File description">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="uploaded_file_tag">File Tag:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$file_data['uploaded_file_tag']?>" name="uploaded_file_tag" id="uploaded_file_tag" placeholder="Enter File Tag">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="m-auto text-center">
                    <button type="submit" class="btn primary_btn">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
