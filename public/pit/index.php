<?php
if(isset($_POST['submit'])){

    //collect form data
		$scout_name = $_POST["scout_name"];
		$scout_number = $_POST["scout_number"];
		$team_number = $_POST["team_number"];
		$number_of_wheels = $_POST["number_of_wheels"];
		$wheel_type = $_POST["wheel_type"];
		$drive_motor_type = $_POST["drive_motor_type"];
		$number_of_motors = $_POST["number_of_motors"];
		$cross_autoline = $_POST["autoline"];
		$scale_cube = $_POST["scale_cube"];
		$switch_cube = $_POST["switch_cube"];
		$number_of_cubes = $_POST["auto_cubes"];
		$collect_cubes = $_POST["collect_cubes"];
		$cube_layers = $_POST["cube_layers"];
		$play_defense = $_POST["play_defense"];
		$prefered_location = $_POST["prefered_location"];
		$teleop_scale = $_POST["tele_scale"];
		$teleop_switch = $_POST["tele_switch"];
		$climb = $_POST["eg_style"];
		$park = $_POST["eg_park"];
		$helpothers = $_POST["helpothers"];
		$vision = $_POST["vision"];
		$drive_coach = $_POST["drive_coach"];
		$pit_notes = $_POST["pit_notes"];

    //if no errors carry on
    if(!isset($error)){

        # Title of the CSV
        $Content = "Scout Name, Scout Number, Team Number, Number of Wheels, Wheel Type, Drive Motor Type, Number of Motors, Cross Autoline, Scale Cube, Switch Cube, Number of Cubes, Collect Cubes, Cube Layers, Play Defense, Prefered Location, Teleop Scale, Teleop Switch, Climb, Park, Help Others, Vision, Drive Coach, Pit Notes\n";

        //set the data of the CSV
        $Content .= "$scout_name, $scout_number, $team_number, $number_of_wheels, $wheel_type, $drive_motor_type, $number_of_motors, $cross_autoline, $scale_cube, $switch_cube, $number_of_cubes, $collect_cubes, $cube_layers, $play_defense, $prefered_location, $teleop_scale, $teleop_switch, $climb, $park, $helpothers, $vision, $drive_coach, $pit_notes\n";

        # set the file name and create CSV file
        $FileName = "PitScouting_scoutedby_".$scout_name."TeamNumber_".$team_number.".csv";
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $FileName . '"');
        echo $Content;
        exit();
    }
}

//if their are errors display them
if(isset($error)){
    foreach($error as $error){
        echo "<p style='color:#ff0000'>$error</p>";
    }
}


?>
<head>
  <!DOCTYPE html>
  <html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Project Siller</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets/css/please-wait.css">
  <link rel="stylesheet" href="../assets/css/pinkit.css">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
  <link rel="stylesheet" href="../assests/css/jquery-ui.min.css">
  <!-- Stylized Toggle Switch -->
  <link rel="stylesheet" href="../assets/css/toggleswitch.css">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery.cookie.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/sweetalert2.min.js"></script>
  <script src="../assets/js/jquery-ui.min.js"></script>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Project Siller</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">Pit Scouting</a></li>
					<li ><a href="../match/index.php">Match Scouting</a></li>
				</ul>
			</div>
		</div>
	</nav>

</head>
<body>
<form action='' method='post'>
  <div class="container">
  	<div class="panel panel-info">
  		<div class="panel-heading"> <h2 class="panel-title">Pit Scouting</h2></div>
  		<div class="panel-body">
  				<div class="col-md-12">
  					<h2 class="text-center underlined">General Information:</h2>
  					<div class="form-group col-md-4">
  						<label for="scout_name">Your Name</label>
  						<input class="form-control" id="scout-name" name="scout_name" type="text" autocomplete="off" required autofocus>
  					</div>
  					<div class="form-group col-md-4">
  						<label for="scout_number">Your Team Number</label>
  						<input class="form-control" id="my-team-num" name="scout_number" type="number" autocomplete="off" required>
  					</div>
  					<div class="form-group col-md-4">
  						<label for="teamnumber">Team You're Scouting</label>
  						<input class="form-control" name="team_number" id="their-team-num" type="number" autocomplete="off" required>
  					</div>
  					</div>
  <!-- 	DriveBase	 -->
	<div class="col-md-12">
		<h3 class="text-center underlined">Drivebase</h3>
	<div class="form-group col-md-3">
	  <label for="teleop_scale_fail">Number of Wheels?</label>
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-danger btn-minus stepper" type="button">–</button>
			</span>
				<input id="number-of-wheels"  class="form-control stepper-display" name="number_of_wheels" type="number" value="0">
			<span class="input-group-btn">
				<button class="btn btn-success btn-plus stepper" type="button">+</button>
			</span>
			</div>
		</div>
			<div class="form-group col-md-3">
			  <div class="forum-group">
			  <label class="form-label" for="wheeltype">Type of Wheels?</label>
			  <select class="form-control form-control-lg" name = 'wheel_type' id="wheeltype" required="" autocomplete="off">
			    <option value="omni">Omni</option>
			    <option value="mecanum">mecanum</option>
			    <option value="colsons">Colsons</option>
			    <option value="swerve">Swerve</option>
					<option value="KOP">Kit of Parts Wheels</option>
			  </select>
			</div>
			</div>
			<div class="form-group col-md-3">
				<label for="teleop_scale_fail">Number of Motors?</label>
				<div class="input-group">
					<span class="input-group-btn">
						<button class="btn btn-danger btn-minus stepper" type="button">–</button>
					</span>
						<input id="number-of-motors"  class="form-control stepper-display" name="number_of_motors" type="number" value="0">
					<span class="input-group-btn">
						<button class="btn btn-success btn-plus stepper" type="button">+</button>
					</span>
					</div>
				</div>
			<div class="form-group col-md-3">
			  <div class="forum-group">
			  <label class="form-label" for="drivemotortype">Type of Drive Motors?</label>
			  <select class="form-control form-control-lg" name = 'drive_motor_type' id="drivemotortype" required="" autocomplete="off">
			    <option value="minicim">Mini-Cim</option>
			    <option value="cim">Cim</option>
			    <option value="775">775 Pro</option>
			  </select>
			</div>
			</div>
		</div>
		<!-- Auto -->
		<div class="col-md-12">
		<h3 class="text-center underlined">Autonomous</h3>
		<div class="form-group col-md-3">
		  <label for="autoline">Do you cross the Autoline?</label>
		  <div class="switch-field">
		    <input name="autoline" id="autoline-yes" type="radio" value="yes"/>
		    <label for="autoline-yes">Yes</label>
		    <input name="autoline" id="autoline-no" type="radio" value="no" checked/>
		    <label for="autoline-no">No</label>
		  </div>
		  </div>

		  <div class="form-group col-md-3">
		  <label for="scale_cube">Place cube on Scale?</label>
		  <div class="switch-field">
		    <input name="scale_cube" id="scale-cube-yes" type="radio" value="yes"/>
		    <label for="scale-cube-yes">Yes</label>
		    <input name="scale_cube" id="scale-cube-no" type="radio" value="no" checked/>
		    <label for="scale-cube-no">No</label>
		  </div>
		  </div>

		  <div class="form-group col-md-3">
		  <label for="switch_cube">Place cube on Switch?</label>
		  <div class="switch-field">
		    <input name="switch_cube" id="switch-cube-yes" type="radio" value="yes"/>
		    <label for="switch-cube-yes">Yes</label>
		    <input name="switch_cube" id="switch-cube-no" type="radio" value="no" checked/>
		    <label for="switch-cube-no">No</label>
		  </div>
		  </div>
			<div class="form-group col-md-3">
		  <label>How many cubes do you use in Auto?</label>
		  <div class="input-group">
		    <span class="input-group-btn">
		      <button class="btn btn-danger btn-minus stepper" type="button">–</button>
		    </span>
		      <input id="auto-cubes"  class="form-control stepper-display" name="auto_cubes" type="number" value="0">
		    <span class="input-group-btn">
		      <button class="btn btn-success btn-plus stepper" type="button">+</button>
		    </span>
		    </div>
			</div>
		</div>
		<!-- 	Tele	 -->
		<div class="col-md-12">
		<h3 class="text-center underlined">Tele-Op</h3>

		<div class="form-group col-md-4">
		<div class="forum-group">
		<label class="form-label" for="drivemotortype">How do you prefer to collect cubes?</label>
		<select class="form-control form-control-lg" name ='collect_cubes' id="collect_cubes" required="" autocomplete="off">
			<option value="ground">Ground</option>
			<option value="exchange">Exchange</option>
			<option value="na">N/A</option>
		</select>
		</div>
		</div>

		<div class="form-group col-md-4">
		<label>How many layers can you place on the Scale?</label>
		<div class="input-group">
		<span class="input-group-btn">
			<button class="btn btn-danger btn-minus stepper" type="button">–</button>
		</span>
			<input id="cube_layers"  class="form-control stepper-display" name="cube_layers" type="number" value="0">
		<span class="input-group-btn">
			<button class="btn btn-success btn-plus stepper" type="button">+</button>
		</span>
		</div>
	</div>
		<label for="play_defense">Play defense?</label>
		<div class="switch-field">
			<input name="play_defense" id="play-defense-yes" type="radio" value="yes"/>
			<label for="play-defense-yes">Yes</label>
			<input name="play_defense" id="play-defense-no" type="radio" value="no" checked/>
			<label for="play-defense-no">No</label>
		</div>
	</div>
	<div class="form-group col-md-12">
		<div class="form-group col-md-4">
			<div class="forum-group">
			<label class="form-label" for="drivemotortype">Prefer Scale, Switch or Exchange?</label>
			<select class="form-control form-control-lg" name = 'prefered_location' id="prefered-location" required="" autocomplete="off">
				<option value="scale">Scale</option>
				<option value="switch">Switch</option>
				<option value="exchange">Exchange</option>
			</select>
		</div>
		</div>
		<div class="form-group col-md-4">
		<label for="tele_scale">Place Cubes on the Scale?</label>
		<div class="switch-field">
			<input name="tele_scale" id="tele-scale-yes" type="radio" value="yes"/>
			<label for="tele-scale-yes">Yes</label>
			<input name="tele_scale" id="tele-scale-no" type="radio" value="no" checked/>
			<label for="tele-scale-no">No</label>
		</div>
		</div>
		<div class="form-group col-md-4">
		<label for="tele_switch">Place Cubes on the Switch?</label>
		<div class="switch-field">
			<input name="tele_switch" id="tele-switch-yes" type="radio" value="yes"/>
			<label for="tele-switch-yes">Yes</label>
			<input name="tele_switch" id="tele-switch-no" type="radio" value="no" checked/>
			<label for="tele-switch-no">No</label>
		</div>
	</div>
</div>

<!-- Endgame -->
<div class="col-md-12">
<h3 class="text-center underlined">Endgame</h3>
<div class="form-group col-md-4">
<label for="eg_park">Park only?</label>
<div class="switch-field">
<input name="eg_park" id="eg-park-yes" type="radio" value="yes"/>
<label for="eg-park-yes">Yes</label>
<input name="eg_park" id="eg-park-no" type="radio" value="no" checked/>
<label for="eg-park-no">No</label>
</div>
</div>
<div class="form-group col-md-4">
	<label class="form-label" for="eg_style">Climb?</label>
	<select class="form-control form-control-lg" name = 'eg_style' id="eg-style" required="" autocomplete="off">
		<option value="Rung">Rung</option>
		<option value="Side">Side Bars</option>
		<option value="Detach_hook">Detachable Hook</option>
		<option value="n/a">No</option>
	</select>
</div>
<div class="form-group col-md-4">
	<div class="forum-group">
	<label class="form-label" for="helpothers">Help other Robots climb?</label>
	<select class="form-control form-control-lg" name= "helpothers" id="helpothers" required="" autocomplete="off">
		<option value="Ramps">Ramps</option>
		<option value="Lift">Lift</option>
		<option value="No">No</option>
	</select>
</div>
</div>
</div>

<!--- misc -->
<div class="col-md-12">
<h3 class="text-center underlined">miscellaneous:</h3>
<div class="form-group col-md-6">
<label for="vision">Use Vision?</label>
<div class="switch-field">
	<input name="vision" id="vision-yes" type="radio" value="yes"/>
	<label for="vision-yes">Yes</label>
	<input name="vision" id="vision-no" type="radio" value="no" checked/>
	<label for="vision-no">No</label>
</div>
</div>
<div class="form-group col-md-6">
<label for="drive_coach">Drive Coach Mentor or Student?</label>
<div class="switch-field">
	<input name="drive_coach" id="drive-coach-student" type="radio" value="student"/>
	<label for="drive-coach-student">Student</label>
	<input name="drive_coach" id="drive-coach-mentor" type="radio" value="mentor"/>
	<label for="drive-coach-mentor">Mentor</label>
</div>
</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label for="pit_notes">Pit Scouting Notes</label>
		<input class="form-control" id="pit-notes" type="textarea" name="pit_notes" autocomplete="off" placeholder="Anything interesting?">
	</div>

  	<!-- 	Submit -->
  	<div class="submit">
  		<input type='submit' class="btn btn-block btn-success" name='submit' value='Submit'>
  	</div>
	</div>
</div>
</div>

</form>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script>

			$('.btn-minus').on('click', function(){
				if (parseInt($(this).parent().siblings('input').val()) > 0)
				{
			    	$(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) - 1)
			    }
			})

			$('.btn-plus').on('click', function(){
			  $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) + 1)
			})

			$(document).ready(function(){
			    $(".segmented label input[type=radio]").each(function(){
			        $(this).on("change", function(){
			            if($(this).is(":checked")){
			               $(this).parent().siblings().each(function(){
			                    $(this).removeClass("checked");
			                });
			                $(this).parent().addClass("checked");
			            }
			        });
			    });
			});
		</script>
		<script src="/mobile.js"></script>
		<script type="text/javascript" src="please-wait.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				if($.cookie('loading') == undefined || $.cookie('loading') == null) {
					window.loading_screen = window.pleaseWait({
						logo: "logo.svg",
						backgroundColor: '#AC1B1E',
						loadingHtml: "<p class='loading-message'>Project Siller<br>An online scouting platform for FIRST Robotics</p><div class='sk-spinner sk-spinner-three-bounce'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div>"
					});
					setTimeout(function() { window.loading_screen.finish();}, 3000);
					var date = new Date();
					date.setTime(date.getTime() + (5 * 60 * 1000));
					$.cookie("loading", "true", { expires: date });
				}
			});
			</script>
			<footer class="section section-footer">
			<div id="copyright" class="grid-footer container grid-lg">
				<p><a href="https://siller.io/">Home</a> | <a href="http://status.siller.io/" target="_blank">Status</a> | <a href="https://sillerio.slack.com/" target="_blank">Slack</a> | <a href="https://twitter.com/sillerfrc" target="_blank">Twitter</a> | <a href="https://siller.io/tos">Terms of Service</a> | <a href="https://siller.io/privacy">Privacy Policy</a> | Version: <span class="version">Early Beta</span></p>
				<p>Sponsored by <a href="https://www.metalmoose.org" target="_blank">The Metal Moose</a>. With the support from <a href="http://frc272.com/" target="_blank">Team 272</a>. ProjectSiller is written and maintaned by<a href="mailto:drew.currie@westtown.edu"> Drew Currie</a></p>
			</div>
		</footer>
	</body>
</html>
