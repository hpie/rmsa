<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area"> 
        <h2>Parent File Details</h2>
        <hr>
        <div class="row">            
            <div class="col-md-12"> 
                <table class="table">
                    <tr>
                        <td><b>File Link:</b></td>
                        <?php 
                            $filepath="/assets/front/fileupload/server/php/files";
                            $link_str="https://docs.google.com/viewer?url=".BASE_URL.$filepath."/".$result['uploaded_file_path']."&embedded=true";                            
                        ?>
                        <td>                    
                            <a href="<?php echo $link_str; ?>" class="viewFile"><img src="<?php echo BASE_URL; ?>/assets/front/fileupload/img/file-icon/icon/<?php echo $result['uploaded_file_type']; ?>.png" style="width:10%;"></a>                                                
                        </td>                    
                    </tr> 
                    <tr>
                        <td><b>File Title:</b></td>  
                        <td><?php echo $result['uploaded_file_title']; ?></td>
                    </tr>
                    <tr>
                        <td><b>File Group:</b></td>  
                        <td><?php echo $result['uploaded_file_group']; ?></td>
                    </tr>
                    <tr>
                        <td><b>File Category:</b></td>  
                        <td><?php echo $result['uploaded_file_category']; ?></td>
                    </tr>
                    <tr>
                        <td><b>File Description:</b></td>
                        <td><?php echo $result['uploaded_file_desc']; ?></td>                        
                    </tr>
                    <tr>
                        <td><b>File Tag:</b></td>  
                        <td><?php echo $result['uploaded_file_tag']; ?></td>
                    </tr>                   
                </table>                          
            </div>
        </div>
        <div class="">
            <hr>
            <h1>Child File Upload</h1>         
            <!-- The file upload form used as target for the file upload widget -->
            <form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">               
                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/" /></noscript>
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-sm btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <input type="file" name="files[]" multiple class="input-sm"/>
                        </span>                                                               
                        <button type="submit" class="btn btn-sm btn-primary start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn btn-sm btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel upload</span>
                        </button>
<!--                        <button type="button" class="btn btn-sm btn-danger delete">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete selected</span>
                        </button>-->
                        <!--<input type="checkbox" class="toggle" />-->
                        <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>
                    <!-- The global progress state -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped">
                    <tbody class="files"></tbody>
                </table>
            </form>            
        </div>
        <!-- The blueimp Gallery widget -->
<!--        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even" >
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>-->
        <!-- The template to display files available for upload -->
        <script nonce='S51U26wMQz' id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
            <td>
            <span class="preview"></span>
            </td>
            <td>
            {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
            <p class="name">{%=file.name%}</p>
            {% } %}
            <strong class="error text-danger"></strong>
            </td>
            <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>           
            {% if (!i && !o.options.autoUpload) { %}            
            <button class="btn btn-sm btn-primary start form-control" disabled>
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start</span>
            </button>            
            {% } %} 
            </td>            
             <td>
                  {% if (!i) { %}
                      <button class="btn btn-sm btn-warning cancel form-control">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>                                    
            <td>
            <label class="title col-md-6">
                <span>Title:</span><br>
                <input type="text" name="uploaded_file_title[]" class="form-control input-sm input">
            </label>           
            <label class="description col-md-6">
                <span>Description:</span><br>
                <input type="text" name="uploaded_file_desc[]" class="form-control input-sm input">
            </label>             
            <label class="title col-md-6">
                <span>Tag:</span><br>
                <input type="text" placeholder="add tag by comma seprated" name="uploaded_file_tag[]" class="form-control input novalidation" required>
            </label>
            <label class="description col-md-6">
                <span>File Order:</span><br>
                <select class="form-control input-sm" name="uploaded_file_volorder[]">
                <?php
                for($i=1;$i<=99;$i++){
                    ?>
                    <option><?php echo $i; ?></option>
                    <?php                
                }
            ?>
              </select>
            </label>
            <input type="hidden" name="rmsa_employee_users_id[]" value="<?php echo $_SESSION['emp_rmsa_user_id']; ?>">
            <input type="hidden" name="uploaded_file_volroot[]" value="<?php echo $rmsa_uploaded_file_id; ?>">
            </td>
            </tr>
            {% } %}
        </script> 
        <!-- The template to display files available for download -->
        <script nonce='S51U26wMQz' id="template-download" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
            <td>
            <span class="preview">
            {% if (file.thumbnailUrl) { %}
            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
            {% } %}
            </span>
            </td>
            <td>
            {% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}
            <p class="name">
            {% if (file.url) { %}
            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            {% } else { %}
            <span>{%=file.name%}</span>
            {% } %}
            </p>
            {% } %}
            {% if (file.error) { %}
            <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
            </td>
            <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
            {% if (file.deleteUrl) { %}       
            {% } else { %}         
            {% } %}
            <p class="title"><strong>{%=file.title||''%}</strong></p>
            <p class="description">{%=file.description||''%}</p>
            </td>
            </tr>
            {% } %}
        </script>
    </div>
</div>        
