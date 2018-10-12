<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reader Writer</title>
</head>
<body>
 
<?php
    if(!isset($_SESSION['process_name'])){
?>
        <form method="POST" action="login.php">
            <input name="process_name" type="text" placeholder="Enter Process Name">
            <button name="submit" type="submit">LOGIN</button>
        </form>
<?php
    }else{
?>
        <div>
            <span>This Process Name</span>
            <span><?php echo $_SESSION['process_name']; ?></span>
        </div>
        <br>
        <div>
            <span>
                <h4>Current Process in Critical Section</h4>
                <h4>{PROCESS_NAME}</h4>
            </span>
            <span>
                <h4>Operation</h4>
                <h4>{READ/WRITE}</h4>
            </span>
        </div>
        <div>
            <button>Acquire Read Lock</button>
            <button>Acquire Write Lock</button>
            <br>
            <br>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
        <span>
          <h3>Reading Queue</h3>
           <table>
              <tr>
                <th>No</th>
                <th>Process Name</th>
              </tr>
              <tr>
                <td>1</td>
                <td>Jill</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Eve</td>
              </tr>
            </table>
        </span>
        <br>
        <br>
        <span>
          <h3>Writing Queue</h3>
           <table>
              <tr>
                <th>No</th>
                <th>Process Name</th>
              </tr>
              <tr>
                <td>1</td>
                <td>Jill</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Eve</td>
              </tr>
            </table>
        </span>
        
<?php        
    }
?>
  
</body>
</html>
