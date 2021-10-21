<?php
$conn = mysqli_connect("localhost", "root", "", "sparks_bank");
if($conn-> connect_error){
    die("connection failed:". $conn-> connect_error);
}
$sql = "SELECT name, email,amount FROM banking";
error_reporting(0);
$result = mysqli_query($conn,"SELECT *  FROM banking");
$resul1 = mysqli_query($conn,"SELECT *  FROM banking");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
    </style>
</head>
<body>
<?php
include 'navbar.php';
?>  
<div class ='form'> 
    <h1 align ='center'> Transfer Money </h1>
</div> 
<div class='main'>
<form action="" method="GET" class = "form">
        <select  class= fromuser type="text"  name="u1" required value="">
        <option value ="">Sender</option>
        <?php
                        while($tname = mysqli_fetch_array($result)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
        <select  class =touser  type="text" name="u2" value="">
         <option value ="">Beneficiary</option>
        <?php
                        while($tname = mysqli_fetch_array($resul1)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
        
        <input type="text" id="amount" name="amt" placeholder="Enter amount">
        
        <input type="submit" id= submit name="submit" value=" Transfer">
        
    </form>
</div>

    <?php
    
            if($_GET['submit'])
            {
            $u1=$_GET['u1'];
            $u2=$_GET['u2'];
            $amt=$_GET['amt'];


            if($u1!="" && $u2!="" && $amt!="")
            {
                //update transaction changes in database
                $query1= "UPDATE banking  SET amount = amount + '$amt' WHERE Name = '$u2' ";
                $data1= mysqli_query($conn, $query1);
                $query2= "UPDATE  banking SET amount = amount  - '$amt' WHERE Name = '$u1' ";
                $data2= mysqli_query($conn, $query2);
                
                //insert into transaction_history
                    $query1 = "INSERT INTO transferhistory (fname,tname,cash) VALUES('$u1','$u2','$amt')";
                                    $res2 = mysqli_query($conn,$query1);
                
                                          if($res2){
                                     $user1 = "SELECT * FROM banking WHERE  Name='$u1' ";
                                                 $res=mysqli_query($conn,$user1);
                                                 $row_count=mysqli_num_rows($res);
                                  }
                
            

                     if ($data1 && $data2)
                     {
                    $message="Successful transfer";
                                        echo "<script type='text/javascript'>alert('$message');
                                        </script>";
                }
                else
                {
                    $message="Error While Commiting Transaction ";
                    echo "<script type='text/javascript'>alert('$message');
                                        </script>";
                }

            }

            else
            {
                $message="All Fields are Mandatory";
                echo "<script type='text/javascript'>alert('$message');
                    </script>";
            }
        }
        

    ?>
</div>  

</body>
</html>