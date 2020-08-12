<?php
include("auth.php");
?>
<?php 
require('db.php');
$username=$_SESSION['username'];
if(isset($_POST['submit'])) {	

	// if($q1=='' || $q2 =='' || $q3 =='' || $q4 =='' || $q5 =='')
    $q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];


	if($q1=='' || $q2 =='' || $q3 =='' || $q5 =='') {
		echo '<h2>Please answer all questions.</h2>';
	}
	else {
		$score = 0;
		if($q1 == 4) { // 1st option is correct
		$score++;
		}
		if($q2 == 1) { // 2nd option is correct
		$score++;
		}
		if($q3 == 3) { // 3rd option is correct
		$score++;
        }
        if($q4 == 1) { // 4th option is correct
        $score++;
        }
        if($q5 == 4) { // 5th option is correct
        $score++;
        }
            $score = $score	/ 5 *100;
            $query = "INSERT into `examination` (`id`, `user_id`, `score`)
            VALUES (NULL, (SELECT id FROM `users` WHERE username='{$username}'), '$score')";
			$result = mysqli_query($con,$query);
			if($result){
				$query = "UPDATE users SET examination = '1' WHERE username = '{$username}'";
				$result = mysqli_query($con,$query);
				header("Location: index.php");
				if(!$result){
					die(mysqli_error($con));
				}
			}
		
		// if($score < 50)
		// {
		// echo '<p>Total score: '.$score.'% (Fail)<br/> You need to score at least 50% to pass the exam!</p>';
		// }
		// else {
		// echo '<p>Total score: '.$score.'% (Pass)<br/> You have passed the exam!</p>';
		// }
		header("Location: index.php");
	}
}
?>