<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">View Information Uploaded on the Portal</h1>                             
        <div class="form-group">                
                <div class="row">                                        
                    <div class="col-sm-6 col-xs-6">
                        <input type="text" class="form-control" placeholder="Search data by tag" id="uploaded_file_tag">
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <button class="btn" id="searchTag">Search</button>
                    </div>                    
                </div>
            </div>        
        <hr>
   
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Title</th>
            <th>File</th>
            <th>Type</th>
            <th>Group</th>
            <th>Category</th>
            <th>Description</th>            
            <th>Comment / Review</th>
            <th>Reviews</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Title</th>
            <th>File</th>
            <th>Type</th>
            <th>Group</th>
            <th>Category</th>
            <th>Description</th>           
            <th>Comment / Review</th>
            <th>Reviews</th>
        </tr>
        </tfoot>
    </table>
         </div>
</div>

<div class="modal" id="review-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave your rating:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="add_rating">
               </div>
                <div class="form-group">
                    <label>Comment:</label>
                    <textarea  class=" form-control review-comment"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script>function enableReview() { document.getElementById("btn_post_review").disabled = false; }</script>
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp"></label>
                    <div class="col-sm-8 col-xs-12">
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableReview"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button"  class="btn btn-primary btn_post_review" id="btn_post_review" >Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="show_comments">
            </div>
        </div>
    </div>
</div>
<div class="modal" id="view-reviews" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Reviews</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="add_rating">
                <div class="show_comments">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>