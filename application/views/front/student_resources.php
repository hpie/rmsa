<div class="col-md-6 col-sm-8  col-12">
    <div class="middle-area">
        <h1 class="heading">View Information Uploaded on the Portal</h1>
        <form class="form-horizontal border p-2" action="#">
            <h2 class="second-heading">View Information</h2>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="distt">Class:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control">
                            <option>Select Class</option>
                            <option>Class IX</option>
                            <option>Class X</option>
                            <option>Class XI</option>
                            <option>Class XII</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="tehsil">Subject:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control">
                            <option value="0">---Select---</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-md-12 col-sm-12  col-12">
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Group</th>
            <th>Category</th>
            <th>Description</th>
            <th>File</th>
            <th>Comment / Review</th>
            <th>Reviews</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Group</th>
            <th>Category</th>
            <th>Description</th>
            <th>File</th>
            <th>Comment / Review</th>
            <th>Reviews</th>
        </tr>
        </tfoot>
    </table>
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
            <div class="modal-footer">
                <button type="button"  class="btn btn-primary btn_post_review">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="show_comments">
            </div>
        </div>
    </div>
</div>