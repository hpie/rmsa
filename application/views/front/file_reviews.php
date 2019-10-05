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

            <?php
                $comments = $reviews['comments'];

                $all_comment = '';
                if (is_array($comments) && sizeof($comments)) {
                    foreach ($comments AS $key => $comment) {
                        $reply_button ='';
                        if(isset($_SESSION['emp_rmsa_user_id'])) {
                            $reply_button = '<p>
                                                <a class="float-right btn btn-outline-primary ml-2" onclick="comment_reply('.$comment['rmsa_review_comment_id'].')">
                                                    <i class="fa fa-reply"></i> Reply
                                                </a>        	            
        	                               </p>';
                        }

                        $all_comment .= '<div class="row">
                                            <div class="col-md-2">
                                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                                <p class="text-secondary text-center">'.$comment['time'].'</p>
                                            </div>
                                            <div class="col-md-10">
                                                <p>
                                                    <a class="float-left" href="#"><strong>'.$comment['username'].'</strong></a>                      
                            
                                                </p>
                                                <div class="clearfix"></div>
                                                <p>'.$comment['rmsa_file_comment'].'</p>
                                                '.$reply_button.'
                                            </div>
                                        </div>';


                        foreach ($comment['replies'] AS $key=> $reply){
                            $all_comment .= '<div class="card card-inner">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                                        <p class="text-secondary text-center">'.$reply['time'].'</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p><a href="#"><strong>'.$reply['username'].'</strong></a></p>
                                                        <p>'.$reply['rmsa_file_comment'].'</p>
                                                        <p>                                                                                                                       
                                                       </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                        }
                    }

                echo $all_comment;
                ?>
            <?php }else{
                    echo "No comments yet";
                }
                ?>
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
