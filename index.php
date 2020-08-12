
<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Everest | Home</title>
<link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="navbar-dark.css">
<link rel="stylesheet" href="home.css">
</head>
<body style="background-color: #EDEFF0;">

<nav class="navbar navbar-expand-lg navbar-dark py-3 sticky-top" style="background-color: #3e474f;">
  <a class="navbar-brand pr-5 text-success font-weight-bold" href="index.php">Everest Admission System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <div class="dropdown">
      <button class="btn text-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="#5fcf80" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
          <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
        </svg>
        <?php if(isset($_SESSION['username'])) : ?>
            <?php echo $_SESSION['username']?>
        <?php endif ?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>

<!-- This is a PHP part 
-->
<?php
require('db.php');
$form=0;
$examination = 0;
$username=$_SESSION['username'];
$user_id = '';
        $query = "SELECT * FROM `users` WHERE username='{$username}'";
$result = mysqli_query($con,$query) or die(mysql_error());
// $rows = mysqli_num_rows($result);
while($rows=mysqli_fetch_array($result)){
  $user_id = $rows['id'];
  $form=$rows['form'];
  $examination=$rows['examination'];
}
if (isset($_REQUEST['submit'])){
  $last_name=stripslashes($_REQUEST['last_name']);
  $last_name=mysqli_real_escape_string($con,$last_name);
	$first_name = stripslashes($_REQUEST['first_name']);
	$first_name = mysqli_real_escape_string($con,$first_name); 
	$birth_date = stripslashes($_REQUEST['birth_date']);
	$birth_date = mysqli_real_escape_string($con,$birth_date);
	$gender = stripslashes($_REQUEST['gender']);
  $gender= mysqli_real_escape_string($con,$gender);
  $state_of_birth = stripslashes($_REQUEST['state_of_birth']);
  $state_of_birth= mysqli_real_escape_string($con,$state_of_birth);
  $country_of_birth = stripslashes($_REQUEST['country_of_birth']);
  $country_of_birth= mysqli_real_escape_string($con,$country_of_birth);
  $home_phone = stripslashes($_REQUEST['home_phone']);
  $home_phone= mysqli_real_escape_string($con,$home_phone);
  $email = stripslashes($_REQUEST['email']);
  $email= mysqli_real_escape_string($con,$email);
  $home_address = stripslashes($_REQUEST['home_address']);
  $home_address= mysqli_real_escape_string($con,$home_address);
  $unit_number = stripslashes($_REQUEST['unit_number']);
  $unit_number= mysqli_real_escape_string($con,$unit_number);
  $region = stripslashes($_REQUEST['region']);
  $region= mysqli_real_escape_string($con,$region);
  $country = stripslashes($_REQUEST['country']);
  $country= mysqli_real_escape_string($con,$country);
  $current_school_name = stripslashes($_REQUEST['current_school_name']);
  $current_school_name= mysqli_real_escape_string($con,$current_school_name);
  $current_grade_level = stripslashes($_REQUEST['current_grade_level']);
  $current_grade_level= mysqli_real_escape_string($con,$current_grade_level);
  $current_school_address = stripslashes($_REQUEST['current_school_address']);
  $current_school_address= mysqli_real_escape_string($con,$current_school_address);
  $school_region = stripslashes($_REQUEST['school_region']);
	$school_region= mysqli_real_escape_string($con,$school_region);
  $grade_level_of_entry = stripslashes($_REQUEST['grade_level_of_entry']);
  $grade_level_of_entry= mysqli_real_escape_string($con,$grade_level_of_entry);
  $discipline_of_entry = stripslashes($_REQUEST['discipline_of_entry']);
  $discipline_of_entry= mysqli_real_escape_string($con,$discipline_of_entry);
    $query = "INSERT into `form` (`id`, `user_id`, `last_name`,`first_name`, `birth_date`, `gender`, `state_of_birth`, `country_of_birth`, `home_phone`, `email`, `home_address`, `unit_number`, `region`, `country`, `current_school_name`, `current_grade_level`, `current_school_address`, `school_region`, `grade_level_of_entry`, `discipline_of_entry`)
    VALUES (NULL, (SELECT id FROM `users` WHERE username='{$username}'), '$last_name', '$first_name', '$birth_date', '$gender','$state_of_birth','$country_of_birth','$home_phone','$email','$home_address','$unit_number', '$region','$country','$current_school_name', '$current_grade_level', '$current_school_address','$school_region','$grade_level_of_entry','$discipline_of_entry')";
        $result = mysqli_query($con,$query);
        if($result){
            $query = "UPDATE users SET form = '1' WHERE username = '{$username}'";
            $result = mysqli_query($con,$query);
            header("Location: index.php");
            if(!$result){
              die(mysqli_error($con));
            }/*if($result){
            echo "<div class='form'>
<h3>You are form is submitted.</h3>";
}*/else{
			die(mysqli_error($con));
		} 
        } else {
          die(mysqli_error($con));
        }
    }else {
?>


<div class="container pt-5 w-75 ml-0">
  <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house-fill mr-2" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
          <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg>
          Home
        </a>
        <a class="list-group-item list-group-item-action" id="list-application-list" data-toggle="list" href="#list-application" role="tab" aria-controls="application">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-info-circle-fill mr-2" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </svg>
          Application Form
        </a>
        <a class="list-group-item list-group-item-action" id="list-examination-list" data-toggle="list" href="#list-examination" role="tab" aria-controls="examination">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-question-circle-fill mr-2" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.57 6.033H5.25C5.22 4.147 6.68 3.5 8.006 3.5c1.397 0 2.673.73 2.673 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.355H7.117l-.007-.463c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.901 0-1.358.603-1.358 1.384zm1.251 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
        </svg>
          Examination
        </a>
        <a class="list-group-item list-group-item-action" id="list-admission-list" data-toggle="list" href="#list-admission" role="tab" aria-controls="admission">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-file-check-fill mr-2" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm-1.146 5.854a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
        </svg>
          Admission Results
        </a>
      </div>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
          <h2>Instructions</h2>
          <p>Please be advised to follow the steps below to sit for an exam and hopefully get admitted.</p>
          <h4>Step 1:</h4>
          <p>Click on the <mark class="badge badge-pill badge-success">Application Form</mark> tab at the sidebar and fill in the application form accurately, then hit submit.</p>
          <h4>Step 2:</h4>
          <p>Click on the <mark class="badge badge-pill badge-success">Examination</mark> tab at the sidebar and attempt all questions. After completion, do not forget to hit submit. Next, wait to see your score.</p>
          <h4>Step 3:</h4>
          <p>As soon as you finish submitting your exam, you can view your admission status by clicking on the <mark class="badge badge-pill badge-success">Admission Results</mark> tab at the sidebar.</p>
          <p>Good luck with that!</p>
        </div>
        <div class="tab-pane fade" id="list-application" role="tabpanel" aria-labelledby="list-application-list">
          <h2 class="mb-4">Application Form</h2>

<!-- Form should go to insertApplication.php -->
        <?php if ($form) {
              echo "<p>Form submitted successfully. Kindly proceed with the remaining steps</p>";
            } else {?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Please make sure to fill in the form with accurate information. Any misinformation will lead to your application being terminated instantly.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <form class="mb-5" action="index.php" method="post">
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="last-name">*Last Name</label>
                  <input type="text" class="form-control form-control-lg" id="last-name" name="last_name">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="first-name">*First Name</label>
                  <input type="text" class="form-control form-control-lg" id="first-name" name="first_name">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="birth-date">*Date of Birth</label>
                  <input type="date" class="form-control form-control-lg" id="birth-date" name="birth_date">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="gender">*Gender</label>
                  <select class="custom-select custom-select-lg" id="gender" name="gender">
                    <option selected hidden value="">Choose Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="state-of-birth">*State of Birth</label>
                  <input type="text" class="form-control form-control-lg"  name="state_of_birth">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="country-of-birth">*Country of Birth</label>
                  <input type="text" class="form-control form-control-lg" id="country-of-birth" name="country_of_birth">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="home-phone">*Home Phone</label>
                  <input type="text" class="form-control form-control-lg" id="home-phone" name="home_phone">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control form-control-lg" id="email" name="email">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-8">
                <div class="form-group">
                  <label for="home-address">*Home Address</label>
                  <input type="text" class="form-control form-control-lg" id="home-address" name="home_address">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="unit-number">Apt/Unit No.</label>
                  <input type="text" class="form-control form-control-lg" id="unit-number" name="unit_number">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="region">*Region</label>
                  <select class="custom-select custom-select-lg" id="region" name="region">
                    <option selected hidden value="">Choose Region</option>
                    <option value="Arusha">Arusha</option>
                    <option value="Dar es Salaam">Dar es Salaam</option>
                    <option value="Dodoma">Dodoma</option>
                    <option value="Geita">Geita</option>
                    <option value="Iringa">Iringa</option>
                    <option value="Kagera">Kagera</option>
                    <option value="Katavi">Katavi</option>
                    <option value="Kigoma">Kigoma</option>
                    <option value="Kilimanjaro">Kilimanjaro</option>
                    <option value="Lindi">Lindi</option>
                    <option value="Manyara">Manyara</option>
                    <option value="Mara">Mara</option>
                    <option value="Mbeya">Mbeya</option>
                    <option value="Mjini Magharibi">Mjini Magharibi</option>
                    <option value="Morogoro">Morogoro</option>
                    <option value="Mtwara">Mtwara</option>
                    <option value="Mwanza">Mwanza</option>
                    <option value="Njombe">Njombe</option>
                    <option value="Pemba Kaskazini">Pemba Kaskazini</option>
                    <option value="Pemba Kusini">Pemba Kusini</option>
                    <option value="Pwani">Pwani</option>
                    <option value="Rukwa">Rukwa</option>
                    <option value="Ruvuma">Ruvuma</option>
                    <option value="Shinyanga">Shinyanga</option>
                    <option value="Simiyu">Simiyu</option>
                    <option value="Singida">Singida</option>
                    <option value="Songwe">Songwe</option>
                    <option value="Tabora">Tabora</option>
                    <option value="Tanga">Tanga</option>
                    <option value="Unguja Kaskazini">Unguja Kaskazini</option>
                    <option value="Unguja Kusini">Unguja Kusini</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="country">*Country</label>
                  <input type="text" class="form-control form-control-lg" id="country" name="country">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-7">
                <div class="form-group">
                  <label for="current-school-name">*Current School Name</label>
                  <input type="text" class="form-control form-control-lg" id="current-school-name" name="current_school_name">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="current-grade-level">*Current Grade Level</label>
                  <select class="custom-select custom-select-lg" id="current-grade-level" name="current_grade_level">
                    <option selected hidden value="">Choose Current Grade Level</option>
                    <option value="Grade 7">Grade 7</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="current-school-address">*Current School Address</label>
                  <input type="text" class="form-control form-control-lg" id="current-school-address" name="current_school_address">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="school-region">*Region</label>
                  <select class="custom-select custom-select-lg" id="school-region" name="school_region">
                    <option selected hidden value="">Choose Region</option>
                    <option value="Arusha">Arusha</option>
                    <option value="Dar es Salaam">Dar es Salaam</option>
                    <option value="Dodoma">Dodoma</option>
                    <option value="Geita">Geita</option>
                    <option value="Iringa">Iringa</option>
                    <option value="Kagera">Kagera</option>
                    <option value="Katavi">Katavi</option>
                    <option value="Kigoma">Kigoma</option>
                    <option value="Kilimanjaro">Kilimanjaro</option>
                    <option value="Lindi">Lindi</option>
                    <option value="Manyara">Manyara</option>
                    <option value="Mara">Mara</option>
                    <option value="Mbeya">Mbeya</option>
                    <option value="Mjini Magharibi">Mjini Magharibi</option>
                    <option value="Morogoro">Morogoro</option>
                    <option value="Mtwara">Mtwara</option>
                    <option value="Mwanza">Mwanza</option>
                    <option value="Njombe">Njombe</option>
                    <option value="Pemba Kaskazini">Pemba Kaskazini</option>
                    <option value="Pemba Kusini">Pemba Kusini</option>
                    <option value="Pwani">Pwani</option>
                    <option value="Rukwa">Rukwa</option>
                    <option value="Ruvuma">Ruvuma</option>
                    <option value="Shinyanga">Shinyanga</option>
                    <option value="Simiyu">Simiyu</option>
                    <option value="Singida">Singida</option>
                    <option value="Songwe">Songwe</option>
                    <option value="Tabora">Tabora</option>
                    <option value="Tanga">Tanga</option>
                    <option value="Unguja Kaskazini">Unguja Kaskazini</option>
                    <option value="Unguja Kusini">Unguja Kusini</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row mb-4">
              <div class="col">
                <div class="form-group">
                  <label for="grade-level-of-entry">*Grade Level of Entry</label>
                  <select class="custom-select custom-select-lg" id="grade-level-of-entry" name="grade_level_of_entry">
                    <option selected hidden value="">Choose Grade Level of Entry</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                    <option value="Form 4">Form 4</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="discipline-of-entry">*Discipline of Entry</label>
                  <select class="custom-select custom-select-lg" id="discipline-of-entry" name="discipline_of_entry">
                    <option selected hidden value="">Choose Discipline of Entry</option>
                    <option value="Science">Science</option>
                    <option value="Business">Business</option>
                    <option value="Art">Art</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
          </form>
        <?php }?>
        </div>
        <div class="tab-pane fade" id="list-examination" role="tabpanel" aria-labelledby="list-examination-list">
          <h2>Examination</h2>

          <!-- Examination starts here -->
        <?php if ($examination) {
            echo "<p>Answers submitted successfully. To view your results, hit Admission Results.</p>";
          } else if (!$form){
            echo "<p>Fill the Application Form first.</p>";
          } else {?>


          <div class="alert alert-info alert-dismissible fade show" role="alert">
            Please cross-check your answers before submitting.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <p>Answer all questions below.</p>
          <form action="score.php" method="post">
            <p><span class="badge badge-pill badge-primary">1</span> Can we use the conference room? - Sure, it _____ this morning. </p>
            <div class="form-group"> 
            <ol>
            <li>
            <input type="radio" name="q1" value="1" /> isn't using
            </li>
            <li>
            <input type="radio" name="q1" value="2" /> isn't used
            </li>
            <li>
            <input type="radio" name="q1" value="3" /> hasn't used
            </li>
            <li>
            <input type="radio" name="q1" value="4" /> isn't being used
            </li>
            </ol>
            </div>
            <br/>
            <div class="form-group"> 
            <p><span class="badge badge-pill badge-primary">2</span> I’m not feeling well. I’d rather _______ in tonight. </p>
            <ol>
            <li>
            <input type="radio" name="q2" value="1" /> stay
            </li>
            <li>
            <input type="radio" name="q2" value="2" /> to stay
            </li>
            <li>
            <input type="radio" name="q2" value="3" /> you to stay
            </li>
            <li>
            <input type="radio" name="q2" value="4" /> staying
            </li>
            </ol>
            </div>
            <br/>
            <div class="form-group"> 
            <p><span class="badge badge-pill badge-primary">3</span> You ______ him with my wife. She was with me all the time. </p>
            <ol>
            <li>
            <input type="radio" name="q3" value="1" /> may have seen 
            </li>
            <li>
            <input type="radio" name="q3" value="2" /> mustn't see
            </li>
            <li>
            <input type="radio" name="q3" value="3" /> can't have seen
            </li>
            <li>
            <input type="radio" name="q3" value="4" /> should see
            </li>
            </ol>
            </div>
            <br/>
            <div class="form-group"> 
            <p><span class="badge badge-pill badge-primary">4</span> If he_____ phone, tell him to ring back later. </p>
            <ol>
            <li>
            <input type="radio" name="q4" value="1" /> should
            </li>
            <li>
            <input type="radio" name="q4" value="2" /> to can
            </li>
            <li>
            <input type="radio" name="q4" value="3" /> might
            </li>
            <li>
            <input type="radio" name="q4" value="4" /> will
            </li>
            </ol>
            </div>
            <br/>
            <div class="form-group"> 
            <p><span class="badge badge-pill badge-primary">5</span> He must be forty or ______ . </p>
            <ol>
            <li>
            <input type="radio" name="q5" value="1" /> therein
            </li>
            <li>
            <input type="radio" name="q5" value="2" /> thereafter
            </li>
            <li>
            <input type="radio" name="q5" value="3" /> therefore
            </li>
            <li>
            <input type="radio" name="q5" value="4" /> thereabouts
            </li>
            </ol>
            </div>
            <br/>
            <div class="form-group">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary"/>
            </div>
          </form>
        <?php }?>
        </div>
        <div class="tab-pane fade" id="list-admission" role="tabpanel" aria-labelledby="list-admission-list">
          <h2 class="mb-4">Admission Results</h2>
          <!-- Admission Result Goes Here -->

          <?php if($examination && $form){?>

          <?php $result2 = mysqli_query($con, "SELECT * FROM `examination` WHERE user_id='{$user_id}'")?>
          <?php while ($row = mysqli_fetch_array($result2)) { ?>
            <?php $score = $row['score']?>
            <?php if($score >= 60){ ?>
              <p class="text-success-dark">
                Congratulations! You're admitted
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-emoji-smile" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/>
                  <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
              </p>
            <?php } else {?>
              <p class="text-danger-dark">
                Unfortunately, your application is not approved
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-emoji-frown" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path fill-rule="evenodd" d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683z"/>
                  <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
              </p>
            <?php } ?>
          <?php } ?>
          <!-- <p class="text-success-dark">
            Congratulations John Smith. You're admitted
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-emoji-smile" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/>
              <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
            </svg>
          </p> -->
          <?php $result = mysqli_query($con, "SELECT * FROM `form` WHERE user_id='{$user_id}'")?>
          <?php $result2 = mysqli_query($con, "SELECT * FROM `examination` WHERE user_id='{$user_id}'")?>
          <table class="table table-borderless table-striped mb-5">
          <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tbody>
              <tr>
                <th scope="row">Name</th>
                <td>
                <?php echo $row['last_name'] ?>
                <?php echo " "?>
                <?php echo $row['first_name'] ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Class Level</th>
                <td><?php echo $row['grade_level_of_entry'] ?></td>
              </tr>
              <tr>
                <th scope="row">Discipline</th>
                <td><?php echo $row['discipline_of_entry'] ?></td>
              </tr>
              <?php } ?>
              <?php while ($row = mysqli_fetch_array($result2)) { ?>
              <tr>
                <th scope="row">Exam Score</th>
                <td><?php echo $row['score'] ?></td>
              </tr>
              <tr>
                <th scope="row">Grade</th>
                <td>
                  <?php $score = $row['score']?>
                  <?php 
                    if($score >= 75 && $score <= 100){
                      echo "A";
                    } else if($score >= 65 && $score <= 74){
                      echo "B";
                    } else if($score >= 45 && $score <= 64){
                      echo "C";
                    } else if($score >= 30 && $score <= 44){
                      echo "D";
                    } else if($score >= 0 && $score <= 29){
                      echo "F";
                    }
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Admission Status</th>
                <td>
                  <?php $score = $row['score']?>

                  <?php if($score >= 60){ ?>
                    Admitted
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                  <?php } else {?>
                    Not Admitted
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                    </svg>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
              <tr>
                <th scope="row">Feedback</th>
                <td>
                  <?php 
                    if($score >= 60){
                      echo "YOU MADE IT!!! In the following days, you will receive an email on what follows from here.";
                    } else {
                      echo "We regret to inform you that your application to join Everest Schools has been denied.";
                    }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
          <?php } else {
            echo "<p>You have not filled the application form or attempted the examination</p>";
          }?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>