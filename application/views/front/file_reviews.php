<!-- content -->
<div class="col-md-6 col-sm-8  col-12">
    <span class="pull-right">
        <?php
        $star = '';
        if(is_array($reviews['avg_rating'])){
            $rating = $reviews['avg_rating']['overall_rating'];
            $starNumber = rtrim(rtrim(number_format($rating, 1, ".", ""), '0'), '.');
            for ($x = 0; $x < 5; $x++) {
                if (floor($starNumber)-$x >= 1) {
                    $star.= '<i class="fa fa-star" style="color:#ffc000;"></i>';
                }
                elseif ($starNumber-$x > 0) {
                    $star.= '<i class="fa fa-star-half-o" style="color:#ffc000;"></i>';
                }
                else {
                    $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                }
            }
        }
        else{
            for ($x = 0; $x < 5; $x++) {
                $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
            }
        }

        echo $star;
        ?>

    </span>
    <h2 class="text-center"><?= $reviews['file_title'] ?></h2>

    <div class="card">
        <div class="card-body">

            <?php foreach ($reviews['comments'] AS $key=> $review){
                $star = '';
                for ($i = 1; $i <= 5; $i++) {
                    if($i >= $review['rmsa_file_rating']){
                        $star .= ' <span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                    }
                    else{
                        $star .= ' <span class="float-right"><i class="text-warning fa fa-star-o"></i></span>';
                    }
                }

                $comments = $review['comments'];


                $all_comment = '';
                if (is_array($comments)) {
                    foreach ($comments AS $commentId => $comment) {
                        $all_comment .= ' <p>' . $comment . '</p>';

                        if(isset($_SESSION['emp_rmsa_user_id'])) {
                            $all_comment .= '<p>
                                            <a class="float-right btn btn-outline-primary ml-2" onclick="comment_reply('.$commentId.')">
                                                <i class="fa fa-reply"></i> Reply
                                            </a>        	            
        	                              </p>';
                        }
                    }
                }
                ?>

            <div class="row">
                <div class="col-md-2">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    <p class="text-secondary text-center">15 Minutes Ago</p>
                </div>
                <div class="col-md-10">
                    <p>
                        <a class="float-left" href="#"><strong><?= $review['username'] ?></strong></a>
                        <?= $star ?>

                    </p>
                    <div class="clearfix"></div>
                    <?= $all_comment ?>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="modal" id="reply-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave your reply:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Comment:</label>
                    <textarea  class=" form-control reply-comment"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-primary btn_post_reply">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
