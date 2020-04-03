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
        <div class="form-group">                
                <div class="row">                                        
                    <div class="col-sm-4 col-xs-4">
                        Title & Description:
                        <input type="text" class="form-control" placeholder="Title or Description" id="title" <?php if(isset($_SESSION['video_search'])){echo "value='".$_SESSION['video_search']['title']."'";} ?>>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        Topic:
                        <input type="text" class="form-control" placeholder="Search by Topic" id="topic" <?php if(isset($_SESSION['video_search'])){echo "value='".$_SESSION['video_search']['topic']."'";} ?>>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        Sub Topic:
                        <input type="text" class="form-control" placeholder="Search by Sub-Topic" id="sub_topic" <?php if(isset($_SESSION['video_search'])){echo "value='".$_SESSION['video_search']['sub_topic']."'";} ?>>
                    </div>                    
                </div>
            <br>                
            <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        Recommendation :
                        <input type="text" class="form-control" placeholder="Search by Recommendation" id="recommendation" <?php if(isset($_SESSION['video_search'])){echo "value='".$_SESSION['video_search']['recommendation']."'";} ?>>
                    </div>                    
                <div class="col-sm-4 col-xs-4">
                        Subject :
                        <input type="text" class="form-control" placeholder="Search by Subject" id="subject" <?php if(isset($_SESSION['video_search'])){echo "value='".$_SESSION['video_search']['subject']."'";} ?>>
                    </div>                    
                    <div class="col-sm-4 col-xs-4">
                        Class :
                        <select type="text" class="form-control" name="class" id="class_value">
                            <option class="" value="" selected>Select Class</option>
                            <option value="1" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==1){echo 'selected';}} ?>>1</option>
                            <option value="2" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==2){echo 'selected';}} ?>>2</option>
                            <option value="3" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==3){echo 'selected';}} ?>>3</option>
                            <option value="4" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==4){echo 'selected';}} ?>>4</option>
                            <option value="5" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==5){echo 'selected';}} ?>>5</option>
                            <option value="6" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==6){echo 'selected';}} ?>>6</option>
                            <option value="7" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==7){echo 'selected';}} ?>>7</option>
                            <option value="8" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==8){echo 'selected';}} ?>>8</option>
                            <option value="9" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==9){echo 'selected';}} ?>>9</option>
                            <option value="10" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==10){echo 'selected';}} ?>>10</option>
                            <option value="11" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==11){echo 'selected';}} ?>>11</option>
                            <option value="12" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['class_value']==12){echo 'selected';}} ?>>12</option>                            
                        </select>
                    </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        Language :
                        <select type="text" class="form-control" name="language" id="language">
                            <option class="" value="" selected>Select</option>
                            <option value="hindi" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['language']=='hindi'){echo 'selected';}} ?>>Hindi</option>
                            <option value="english" <?php if(isset($_SESSION['video_search'])){if($_SESSION['video_search']['language']=='english'){echo 'selected';}} ?>>English</option>
                        </select>
                    </div>
                <div class="col-sm-4 col-xs-4">
                        Instructor :
                        <input type="text" class="form-control" placeholder="Search by Recommendation" id="instructor" <?php if(isset($_SESSION['video_search'])){echo "value='".$_SESSION['video_search']['instructor']."'";} ?>>
                    </div>                    
                    <div class="col-sm-2 col-xs-2">
                        <br>
                        <button class="btn btn-warning form-control" id="search_all">Search</button>
                    </div>                    
                    <div class="col-sm-2 col-xs-2">
                        <br>
                        <button class="btn btn-danger form-control" id="search_clear">Clear</button>
                    </div>                    
                </div>
            </div>        
        <hr>
        
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
            <iframe width="100%" height="215" allowfullscreen src="<?php echo $video['youtube_video_url']; ?>?rel=0" frameborder="0"></iframe>
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
