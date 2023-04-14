<!-- Dropdown Trigger -->
				<div class="input-field col s9 offset-s3">
					<select name="selected_quiz">
						<option value='-1'>Choose your Quiz</option>
						<?php
                            require_once('connect.php');
                            if(!$resultset = $database_handler->query("SELECT * from quiz ;"))
                            {
			                     die("Query error");
                            }   
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            
                        
                        ?>              
                                <option <?php   
                                if(isset($selected_quiz)){if($selected_quiz==$row['quiz_id']){?> selected="selected" <?php }}?> value="<?php echo $row['quiz_id']; ?>"><?php echo $row['name']; ?> </option>
                        <?php 
                            $count++; }
                        ?>
						
					</select>
					<label>Select Your Quiz</label>
                    
				</div>
			