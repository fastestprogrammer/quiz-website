		        <?php 
            include 'connect.php';
            if($resultset = $database_handler->query("SELECT * from admin;"))
                            {
			                     if($row = $resultset->fetch_assoc())
                                 {
                                     $colour = $row['colour'];
                                 }
                                else
                                {
                                    $msg = "Error Changing in theme.";
                                    $colour = "#455a64";
                                }
                            } 
        else
        {
            $msg = "Error Changing in theme.";
                                    $colour = "#455a64";
        }
?>
		<footer class="page-footer" style="background-color:<?php echo $colour; ?>;position:fixed;bottom:0;left:0;width:100%;">
			<div class="container">
				<div class="row center" style="font-size:25px">
						Developed By CSI-DDU Branch.	
				</div>
			</div>	
        </footer>
            
	
		
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
 </html>
        