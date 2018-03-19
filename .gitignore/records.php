<?php
/*
Allows the user to both create new records and edit existing records
*/

// connect to the database
include("connect-db.php");

// creates the new/edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($name = '', $mobile ='', $year = '', $class = '', $subject = '', $error = '', $id = '')
{ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>
<?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1><?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error
. "</div>";
} ?>

<form action="" method="post">
<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>
<strong>Name: *</strong> <input type="text" name="name"
value="<?php echo $name; ?>"/><br/>


<strong>Mobile Number: *</strong> <input type="text" name="mobile"
value="<?php echo $mobile; ?>"/><br/>

<strong>year: *</strong> <input type="number" name="year"
value="<?php echo $year; ?>"/><br/>

<strong>Class: *</strong> <input type="text" name="class"
value="<?php echo $class; ?>"/><br/>

<strong>Subject: *</strong> <input type="text" name="subject"
value="<?php echo $subject; ?>"/><br/>

<p>* required</p>

<input type="submit" name="submit" value="submit" />

</div>
</form>
</body>
</html>

<?php }



/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{echo "1";
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{echo "2";
// make sure the 'id' in the URL is valid
if (is_numeric($_POST['id']))
{
echo "3";
// get variables from the URL/form
$id = $_POST['id'];
$name = htmlentities($_POST['name'], ENT_QUOTES);
$mobile = htmlentities($_POST['mobile'], ENT_QUOTES);
$year = htmlentities($_POST['year'], ENT_QUOTES);
$class = htmlentities($_POST['class'], ENT_QUOTES);
$subject = htmlentities($_POST['subject'], ENT_QUOTES);
// check that firstname and lastname are both not empty
if ($name == '' || $mobile== '' || $year == '' || $class == '' || $subject== '' )
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($name, $mobile, $year, $class, $subject, $error, $id);
}
else
{
// if everything is fine, update the record in the database
if ($stmt = $mysqli->prepare("UPDATE faculty_details SET name = ?, mobile = ?, year=?, class=?, subject=?
WHERE id=?"))
{
$stmt->bind_param("ssissi", $name, $mobile, $year, $class, $subject, $id);
$stmt->execute();
$stmt->close();
}
// show an error message if the query has an error
else
{
echo "ERROR: could not prepare SQL statement.";
}

// redirect the user once the form is updated
header("Location: view.php");
}
}
// if the 'id' variable is not valid, show an error message
else
{
echo "Error!";
}
}
// if the form hasn't been submitted yet, get the info from the database and show the form
else
{
// make sure the 'id' value is valid
if (is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// get 'id' from URL
$id = $_GET['id'];

// get the recod from the database
if($stmt = $mysqli->prepare("SELECT * FROM faculty_details WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($id, $name, $mobile, $year, $class, $subject);
$stmt->fetch();

// show the form
renderForm($name, $mobile, $year, $class, $subject, NULL, $id);

$stmt->close();
}
// show an error if the query has an error
else
{
echo "Error: could not prepare SQL statement";
}
}
// if the 'id' value is not valid, redirect the user back to the view.php page
else
{
header("Location: view.php");
}
}
}



/*

NEW RECORD

*/
// if the 'id' variable is not set in the URL, we must be creating a new record
else
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// get the form data
$name = htmlentities($_POST['name'], ENT_QUOTES);
$mobile = htmlentities($_POST['mobile'], ENT_QUOTES);
$year = htmlentities($_POST['year'], ENT_QUOTES);
$class = htmlentities($_POST['class'], ENT_QUOTES);
$subject = htmlentities($_POST['subject'], ENT_QUOTES);
// check that firstname and lastname are both not empty
if ($name == '' || $mobile == '' || $year == ''|| $class == '' || $subject== '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($name, $mobile,$year,$class,$subject, $error);
}
else
{
// insert the new record into the database
if ($stmt = $mysqli->prepare("INSERT faculty_details (name, mobile,year,class,subject) VALUES (?, ?, ?, ?, ?)"))
{
$stmt->bind_param("ssiss", $name, $mobile,$year,$class,$subject);
$stmt->execute();
$stmt->close();
}
// show an error if the query has an error
else
{
echo "ERROR: Could not prepare SQL statement.";
}

// redirec the user
header("Location: view.php");
}

}
// if the form hasn't been submitted yet, show the form
else
{
renderForm();
}
}

// close the mysqli connection
$mysqli->close();
?>