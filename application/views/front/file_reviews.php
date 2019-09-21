<!-- content -->
<div class="col-md-6 col-sm-8  col-12">
    <h2 class="text-center"><?= $file_title ?></h2>

    <div class="card">
        <div class="card-body">

            <?php foreach ($review_comments AS $key=> $review){
                $star = '';
                for ($i = 1; $i <= 5; $i++) {
                    if($i >= $review['rmsa_file_rating']){
                        $star .= ' <span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                    }
                    else{
                        $star .= ' <span class="float-right"><i class="text-warning fa fa-star-o"></i></span>';
                    }
                }

                $comments =$review['comments'];


                $all_comment = '';
                if (count($comments)) {
                    foreach ($comments AS $key => $comment) {
                        $all_comment .= ' <p>' . $comment . '</p>';
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
                        <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong><?= $review['username'] ?></strong></a>
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
