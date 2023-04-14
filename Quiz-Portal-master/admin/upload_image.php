
<!--------------------- Header and Side nav bar code ---------------->
<?php
session_start();
if(!isset($_SESSION["uname"]))
    {
        $msg = 'Enter Username and Password First to use edit page of Portal';
        include 'wrong_login.php';
    }
    else
    {
        $name = 'Upload images to questions';
        include 'side_nav_and_header.php'; 
       
		
?>
<!--------------------------- main body -------------------------------->
<script>  $(document).ready(function(){
    $('.tap-target').tapTarget();
  });
      $(document).ready(function(){
    $('.tap-target1').tapTarget();
  });
      $(document).ready(function(){
    $('.tap-target2').tapTarget();
  });
    $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>	

<?php 
        if(isset($_POST['selected_quiz']) || isset($selected_quiz))
        {
            if(isset($_POST['selected_quiz']))
            $selected_quiz=$_POST['selected_quiz'];
                
        }
        if(isset($_POST['selected_ques']) || isset($selected_ques))
        {
            if(isset($_POST['selected_ques']))
            $selected_ques=$_POST['selected_ques'];
                
        }
        
?>


		<div  style="background-color:">
		<div class="row">
			<div class="col s12 center hoverable">
				<div class="row"></div>

                
<!----------------------------------- list of Quizes----------------------------------------------- -->
                 <form action="upload_image.php" method="post">
                <div class="col s6 offset-s1">
				    <?php include 'quiz_list.php'; ?>
                </div>
                <div class="col s1">
                        <button class="btn waves-effect waves-light" type="submit" name="action">GO
                        <i class="material-icons right">send</i>
                        </button> 
                </div>
                </form>
               
		</div>
		</div>
	</div>	

<!---------------------------------------print error message ------------------------------->
           <div class="center"><h5>
               <span class="card-title activator grey-text text-darken-4"><b style="color:red"><?php if(isset($msg)){?><i class="material-icons prefix">priority_high</i> <?php echo $msg; } ?></b></span></h5>
</div>
<!-----------------------------------------Selection between Question or option -------------> 
<div class="row">
    <div class="col s11 offset-s2">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Upload Image to Question</a></li>
        <li class="tab col s3"><a  href="#test2">Upload Image to Option</a></li>
 
      </ul>
    </div>
    <div id="test1" class="col s12">
    
    
    
        <form action="upload_image_action.php" method="post" enctype="multipart/form-data">
        <div class="container hoverable z-depth-1">
            <div class="row">
                <div class="col offset-s1">
                    <div class="z-depth-3 col offset-s3 s10"><p>Select Your Image First</p></div>
                    <div class="row"></div>
                    <div class = "btn"><i class="material-icons left">file_upload</i>
                        <span>Browse</span>  
						
                    </div>
                    <div class="row"></div>
                    <div class = "file-path-wrapper">
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 offset-s1 ">
            
                        
                        <!-- Dropdown Trigger -->
				    <div class="input-field col s9 offset-s3">
				        <select name="selected_ques">
				        <option value='-1'>Choose your Question</option>
						<?php
                           
                            if(!$resultset = $database_handler->query("SELECT * from question where `quiz_id` = '$selected_quiz' ;"))
                            {
			                     die("Query error");
                            }   
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            
                        
                        ?>              
                                <option <?php   
                                if(isset($selected_ques)){if($selected_ques==$row['ques_id']){?> selected="selected" <?php }}?> value="<?php echo $row['ques_id']; ?>"><?php echo $row['description']; ?> </option>
                        <?php 
                            $count++; }
                        ?>
						
					</select>
					<label>Select Your Question</label>
                    
				    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col offset-s1">
                        <?php if(isset($selected_quiz)) { ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"> <?php } ?>
                        
					       <button type="reset" value="Reset" class="waves-effect waves-light btn"><i class="material-icons left">cancel</i>Clear</button>
						<button type="submit" value="submit" class="waves-effect waves-light btn"><i class="material-icons left">file_upload</i>Upload</button>
                    </div>
            </div>
            <div class="row"></div>
        
        </div>
</form>
    </div>
    <div id="test2" class="col s12">
    
                            <!-- Dropdown Trigger -->
        <form action="upload_image.php#test2" method="post">
            
            <?php 
        if (isset($selected_quiz))
            {
                if($selected_quiz-1)
                {
                    ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"/>
                    <?php 
                }
            }
        ?>
				    <div class="input-field col s6 offset-s2">
				        <select name="selected_ques">
				        <option value='-1'>Choose your Question</option>
						<?php
                           
                            if(!$resultset = $database_handler->query("SELECT * from question where `quiz_id` = '$selected_quiz' ;"))
                            {
			                     die("Query error");
                            }   
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            
                        
                        ?>              
                                <option <?php   
                                if(isset($selected_ques)){if($selected_ques==$row['ques_id']){?> selected="selected" <?php }}?> value="<?php echo $row['ques_id']; ?>"><?php echo $row['description']; ?> </option>
                        <?php 
                            $count++; }
                        ?>
						
					</select>
					<label>Select Your Question</label>
                    
				    </div>
<div class="col s1">
                        <button class="btn waves-effect waves-light" type="submit" name="action">GO
                        <i class="material-icons right">send</i>
                        </button> 
                </div>
                
        </form>
            <form action="upload_image_answer_action.php" method="post" enctype="multipart/form-data">
        <div class="container hoverable z-depth-1">
            <div class="row">
                <div class="col offset-s1">
                    <div class = "btn"><i class="material-icons left">file_upload</i>
                        <span>Browse</span>  
						
                    </div>
                    <div class="row"></div>
                    <div class = "file-path-wrapper">
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 offset-s1 ">
            
                                     <!-- Dropdown Trigger -->
				    <div class="input-field col s9 offset-s3">
					<select name="selected_option">
						<option value='-1'>Choose your Option</option>
						<?php
                            
                            if(!$resultset = $database_handler->query("SELECT * from option where `ques_id` = '$selected_ques' ;"))
                            {
			                     die("Query error");
                            }   
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            
                        
                        ?>              
                                <option <?php   
                                if(isset($selected_option)){if($selected_option==$row['option_id']){?> selected="selected" <?php }}?> value="<?php echo $row['option_id']; ?>"><?php echo $row['description']; ?> </option>
                        <?php 
                            $count++; }
                        ?>
						
					</select>
					<label>Select Your Question</label>
                    
				    </div> 

                </div>
            </div>
            <div class="row">
                    <div class="col offset-s1">
                        <?php if(isset($selected_quiz)) if($selected_quiz!=-1){ ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"> <?php } ?>
                          <?php if(isset($selected_ques))if($selected_ques!=-1) { ?><input type="hidden" name="selected_ques" value="<?php echo $selected_ques; ?>"> <?php } ?>
					       <button type="reset" value="Reset" class="waves-effect waves-light btn"><i class="material-icons left">cancel</i>Clear</button>
						<button type="submit" value="submit" class="waves-effect waves-light btn"><i class="material-icons left">file_upload</i>Upload</button>
                    </div>
            </div>
            <div class="row"></div>
        
    
    
    
    
    
    </div>
    
  </div>



                        
                  
			
                        
                        
                        
				</div>
				</div>
        
        
				
        <div class="row"></div><div class="row"></div><div class="row"></div>
			
			</div>
			</form>
                
<!---------------------- Footer--------------------------------------->
<?php include 'footer.php'; }?>
