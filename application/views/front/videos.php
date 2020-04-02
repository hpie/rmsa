<style>
    .videoback{
        background: #dddddd;    
        margin-left:50px;
        margin-bottom:30px;
    }
/*    .middle-area div{
        margin-left:50px;
        margin-bottom:30px;
    }*/
</style>
<!-- content -->
<div class="col-md-9 col-sm-9 middle-area">
    <!--<div class="middle-area">-->
        <h2 class="heading">Youtube Videos</h2>
        <?php if(!empty($videos)){
            $count_video=sizeof($videos);
            $i=1;
     foreach ($videos as $video){
         if($i%2==0){              
         }else{ 
             echo '<div class="row">';
         }
         ?>
        <div class="col-md-5 col-sm-5 videoback">
            <h4><?php echo $video['youtube_video_title']; ?></h4>           
            <iframe width="100%" height="215" src="<?php echo $video['youtube_video_url']; ?>?rel=0" frameborder="0"></iframe>
            <h4>For : <?php echo $video['youtube_video_recomendation']; ?></h4>
            <p><b>Description :</b><br> <?php echo $video['youtube_video_description']; ?></p>
        </div>
        <?php
        if($i%2==0){
            echo '</div>';
         }else{                  
         }
         if($i==$count_video && $i%2!=0){
             echo '</div>';
         }
        $i=$i+1;
     }
        } ?>        
    <!--</div>-->
    <hr>
    <center>
    <?php echo $pagination->createLinks(); ?>
    </center>
</div>
