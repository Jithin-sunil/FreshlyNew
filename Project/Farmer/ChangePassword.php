<?php
include('../Assests/Connection/Connection.php');
include('Header.php');
// session_start();


if(isset($_POST["btnchangepassword"]))
{
	$currentpassword=$_POST["txtoldpassword"];
	$newpassword=$_POST["txtnewpassword"];
	$retypepassword=$_POST["txtretypepassword"];
	
	
$selquery=" select * from tbl_farmers where farmer_id='".$_SESSION['fid']."' ";
$row=$con->query($selquery);
$data=$row->fetch_assoc();
$oldpassword=$data["farmer_password"];


if($oldpassword==$currentpassword)
{
	if($newpassword==$retypepassword)
	{
	$update="update tbl_farmers set farmer_password='$newpassword' where farmer_id='".$_SESSION['fid']."'";
	
		$con->query($update)
		
			?>
				<script>
				alert("update")
				window.location="ChangePassword.php";
				</script>
                <?php
        
	}
		else
		{
			?>
		 	<script>
			alert("Mismatch Details")
			</script>
        	<?php

			}
		}
		else
		{
			?>
			<script>
			alert("Invalid Details")
			</script>
        	<?php
		}
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 18px;
            margin-bottom: 20px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Optional: Responsive design for smaller screens */
        @media (max-width: 600px) {
            td, input[type="text"], input[type="submit"] {
                font-size: 14px;
            }

            input[type="submit"] {
                padding: 8px 16px;
            }
        }
    </style>
</head>

<body>
    <!-- <a href="HomePage.php">Home</a> -->
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Old Password</td>
                <td><input type="text" name="txtoldpassword" id="txtoldpassword" /></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="text" name="txtnewpassword" id="txtnewpassword" /></td>
            </tr>
            <tr>
                <td>Re-Type Password</td>
                <td><input type="text" name="txtretypepassword" id="txtretypepassword" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change Password" />
                    <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
include('Footer.php');
?>

