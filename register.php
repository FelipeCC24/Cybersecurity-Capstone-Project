<?php include "layouts/header.php"; ?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  .container {
    margin-top: 5%;
    width: 50%;
    background-color: #26262b9e;
    padding-top:2%;
    padding-bottom:2%;
  }
  .btn-primary {
    background-color: #673AB7;
}
  </style>




<div class="container">

  <center><h2>Register</h2></center></br>
  <form class="form-horizontal" method="post" action="add_user.php">
    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="name">Name:</label>
	  
      <div class="col-sm-5">
        <input type="text" class="form-control" id="name" placeholder="Enter a username" name="Username" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="email">Email:</label>
	  
      <div class="col-sm-5">
        <input type="email" class="form-control" id="email" placeholder="Enter an email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="pwd">Password:</label>
      <div class="col-sm-5">      
        <input type="password" pattern="(?=^(?:[^A-Z]*[A-Z]))(?=^(?:[^a-z]*[a-z]))(?=^(?:\D*\d))(?=^(?:\w*\W))^[A-Za-z\d\W]{8,}$" class="form-control" id="pwd" placeholder="Enter a password" name="password" required>
        <label>Password must contain minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character.</label><br>
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="number">Phone:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="number" placeholder="Enter a number" name="number">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="name">Address:</label>
	  
      <div class="col-sm-5">
        <textarea class="form-control" id="address" placeholder="Enter your address" name="address" required></textarea>
      </div>
    </div>
    <label>(*)</label><br>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-primary">Register here</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
