<!--------------------- Header and Side nav bar code ---------------->
<?php
if(!isset($_SESSION["uname"]))
session_start();
    if(!isset($_SESSION["uname"]))
    {
        $msg = 'Enter Username and Password First to use Portal';
        include 'wrong_login.php';
    }
    else
    {
        $name = 'Dashboard';
        include 'side_nav_and_header.php'; 
?>
<!---------------------------Main Body--------------------------->
<script>

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  $(document).ready(function(){
    $('.tap-target').tapTarget();
  });
</script>

        <div class="row" ></div>
        <div class="row">
            <div class="col s4 hoverable offset-s4 z-depth-2" style="text-align:center" >
                <p style="font-size:20px;"><b>Welcome to Admin Panel of Portal</b></p>
                </div></div>
<!------------------------------------print error message-------------------------->
   <div class="center"><h5>
               <span class="card-title activator grey-text text-darken-4"><b style="color:red"><?php if(isset($msg)){?><i class="material-icons prefix">priority_high</i> <?php echo $msg; } ?></b></span></h5>
</div>
	

<div class="row">
    <div class="col s3 offset-s2 hoverable z-depth-1">
                <form action="dashboard_action.php" method="post">
                
  <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                      <input  id="first_name" type="text" value="<?php echo $_SESSION['uname']; ?>" name="name" class="validate">
                      <label for="first_name">Username</label>
                    </div>
                    <!-- Tap Target Structure -->
                    
      <a class="waves-effect btn-floating waves-light col s5 offset-s1 btn " onclick="$('.tap-target').tapTarget('open')">Need Help?</a>
    <!--    <a class="waves-effect waves-light btn" onclick="$('.tap-target').tapTarget('close')">Close Help </a> -->
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a id="menu" class="btn btn-floating btn-large  cyan">
            <i class="material-icons ">menu</i>
          </a>
        </div>

        <div class="tap-target  cyan" data-target="menu">
          <div class="tap-target-content white-text">
            <h5>How to change username and password of admin?</h5>
            <p class="white-text">This is usename and password of admin panel,<br>If You Want to change username or password then Overwrite them with New Credentials and click on Update Button.</p>
          </div>
        </div>
          
                    
                </div>
                    
                <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">lock</i>
                      <input  id="first_name" type="text" value="<?php echo $_SESSION['passwd']; ?>" name="passwd" class="validate">
                      <label for="first_name">Password</label>
                    </div>
                 </div>
                 <div class="row">
                     <div class="col s1 offset-s1">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Update
    <i class="material-icons right">send</i>
  </button>
        
                 </div></div>
                </form>
    </div>
    
    <div class="col s4 offset-s1">
    
    
        
        
        
        <ul class="collapsible popout " data-collapsible="accordion">
  
  <li>
    <div class="collapsible-header hoverable  cyan"><i class="material-icons">dehaze</i>Total Available Quizes</div>
    <div class="collapsible-body">
      <?php 
        include 'connect.php';
        if(!$resultset = $database_handler->query("SELECT * from quiz ;"))
                            {
			                     die("Query error");
                            }   
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            ?>
        <div class="row">
            <div class="col s2">
                <span style="font-size:15px"><?php echo $count; ?></span></div><div class="col s5 offset-s2"><span style="font-size:15px;"class="blue-text text-lighten-1"><?php echo $row['name'];?></span><br></div></div>
                                
                            <?php $count++;} ?>
                                
      </div>
  </li>
  
  <li>
     <div class="collapsible-header hoverable cyan"><i class="material-icons">event_available</i>Total Enabled Quizes</div>
    <div class="collapsible-body">
      <?php 
        include 'connect.php';
        if(!$resultset = $database_handler->query("SELECT * from quiz where is_available='1' ;"))
                            {
			                     die("Query error");
                            }   
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            ?>
        <div class="row">
            <div class="col s2">
                <span style="font-size:15px"><?php echo $count; ?></span></div><div class="col s5 offset-s2"><span style="font-size:15px;"class="blue-text text-lighten-1"><?php echo $row['name'];?></span><br></div></div>
                                
                            <?php $count++;} ?>
                                
      </div>
    
  </li>
  
  <li>
    <div class="collapsible-header hoverable cyan"><i class="material-icons">event_busy</i>Total Disabled Quiz</div>
    <div class="collapsible-body">
        <?php 
        include 'connect.php';
        if(!$resultset = $database_handler->query("SELECT * from quiz where is_available='0';"))
                            {
			                     die("Query error");
                            }   
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            ?>
        <div class="row">
            <div class="col s2">
                <span style="font-size:15px"><?php echo $count; ?></span></div><div class="col s5 offset-s2"><span style="font-size:15px;"class="blue-text text-lighten-1"><?php echo $row['name'];?></span><br></div></div>
                                
                            <?php $count++;} ?>
                                
      </div>
  </li>
  
</ul>

        
    <form action="change_colour.php" method="post">
        <div class="hoverable z-depth-1 col s12 ">
            <div class="container">
               <div class="row"></div>
                
    Select your favorite color: <input type="color" name="colour" id="myColor">

<p>click on above colour, choose your colour from colour pallet and click on "change theme" button to change it.</p>

<button  class="btn" type="submit" onclick="myFunction()">  <i class="large material-icons">brush</i>change</button>



<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myColor").value;
    document.getElementById("demo").innerHTML = x;
}
</script>
                
</div></div></form>    
    
        
    </div>
</div>



<!---------------------- Footer--------------------------------------->
<?php include 'footer.php'; }?>
	