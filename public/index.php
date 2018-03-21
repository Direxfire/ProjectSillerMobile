<?php
if(isset($_POST['submit'])){

    //collect form data
    $my_team_num = $_POST["my-team-num"];
    $scout_name = $_POST["scout-name"];
    $match_num = $_POST["match-num"];
    $their_team_num = $_POST["their-team-num"];
    $color = $_POST["color"];
    $field_pos = $_POST["field-pos"];
    $cross_auto = $_POST["cross-auto"];
    $auto_scale = $_POST["auto-scale"];
    $auto_switch = $_POST["auto-switch"];
    $tele_o_switch_s = $_POST["tele-o-switch-s"];
    $tele_o_switch_f = $_POST["tele-o-switch-f"];
    $tele_o_scale_s = $_POST["tele-o-scale-s"];
    $tele_o_scale_f = $_POST["tele-o-switch-f"];
    $tele_d_switch_s = $_POST["tele-d-switch-s"];
    $tele_d_switch_f = $_POST["tele-o-switch-f"];
    $tele_cube_chute_s = $_POST["tele-cube-chute-s"];
    $tele_cube_chute_f = $_POST["tele-cube-chute-f"];
    $tele_cube_ground_s = $_POST["tele-cube-ground-s"];
    $tele_cube_ground_f = $_POST["tele-cube-ground-f"];
    $tele_exchange_s = $_POST["tele-exchange-s"];
    $tele_exchange_f = $_POST["tele-exchange-f"];
    $eg_hoc = $_POST["eg-hoc"];
    $eg_coob = $_POST["eg-coob"];
    $eg_park = $_POST["eg-park"];
    $eg_climb = $_POST["eg-climb"];
    $eg_style = $_POST["eg-style"];
    $eg_levi = $_POST["eg-levi"];
    $match_notes = $_POST["match-notes"];

    //if no errors carry on
    if(!isset($error)){

        # Title of the CSV
        //$Content = "my_team_num, scout_name, match_num, their_team_num, color, field_pos, cross_auto, auto_scale, auto_switch, tele_o_switch_s, tele_o_switch_f, tele_o_scale_s, tele_o_scale_f, tele_d_switch_s, tele_d_switch_f, tele_cube_chute_s, tele_cube_chute_f, tele_cube_ground_s, tele_cube_ground_f, tele_exchange_s, tele_exchange_f, eg_hoc, eg_coob, eg_park, eg_climb, eg_style, eg_levi, match_notes\n";

        //set the data of the CSV
        $Content .= "$my_team_num, $scout_name, $match_num, $their_team_num, $color, $field_pos, $cross_auto, $auto_scale, $auto_switch, $tele_o_switch_s, $tele_o_switch_f, $tele_o_scale_s, $tele_o_scale_f, $tele_d_switch_s, $tele_d_switch_f, $tele_cube_chute_s, $tele_cube_chute_f, $tele_cube_ground_s, $tele_cube_ground_f, $tele_exchange_s, $tele_exchange_f, $eg_hoc, $eg_coob, $eg_park, $eg_climb, $eg_style, $eg_levi, $match_notes\n";

        # set the file name and create CSV file
        $FileName = "MatchNumber_".$match_num."TeamNumber_".$their_team_num.".csv";
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

</head>
<body>
<form action='' method='post'>
  <div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading"> <h2 class="panel-title">Match Scouting <span class="pull-right">Position: <?php echo $position;?></h2></div>
  		<div class="panel-body">
  				<div class="col-md-12">
  					<h2 class="text-center underlined">General Information</h2>
  					<div class="form-group col-md-4">
  						<label for="scout_name">Your Name</label>
  						<input class="form-control" id="scout-name" name="scout-name" type="text" autocomplete="off" required autofocus>
  					</div>
  					<div class="form-group col-md-4">
  						<label for="scout_number">Your Team Number</label>
  						<input class="form-control" id="my-team-num" name="my-team-num" type="number" autocomplete="off" required>
  					</div>
  					<div class="form-group col-md-4">
  						<label for="matchnumber">Match Number</label>
  						<input class="form-control" name="match-num" id="match-num" type="number" onchange="getTeam(this.value);" autocomplete="off" required>
  					</div>
  				</div>
  				<div class="col-md-12">
  					<div class="form-group col-md-4">
  						<label for="teamnumber">Team You're Scouting</label>
  						<input class="form-control" name="their-team-num" id="their-team-num" type="number" autocomplete="off" required>
  					</div>
  					<div class="form-group col-md-4">
  						<label for="color">Alliance Color</label>
  						<input class="form-control" name="color" id="color" type="text" readonly="readonly" automcomplete="off" required value="<?php echo $clean; ?>">
  					</div>
  					<div class="form-group col-md-4">
  						<label>Robot Starting Position</label>
  						<select name="field-pos" class="form-control">
  							<option value="Left">Left</option>
  							<option value="Middle">Middle</option>
  							<option value="Right">Right</option>
  						</select>
  					</div>
  				</div>
  <!-- 	Auto	 -->
  <div class="col-md-12">
  	<h2 class="text-center underlined">Autonomous</h2>
  		<div class="form-group col-md-4">
  	<div class="form-group">
  		<label>Cross Autoline?</label>
  		<div class="switch-field">
        <input type="radio" id="switch_left" name="cross-auto" value="1" />
        <label for="switch_left">Yes</label>
        <input type="radio" id="switch_right" name="cross-auto" value="0" checked />
        <label for="switch_right">No</label>
      </div>
  	</div>
  </div>

  	<div class="form-group col-md-4">
  		<label>Cubes Placed on the Scale</label>
  		<div class="input-group">
  			<span class="input-group-btn">
  				<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  			</span>
  				<input id="auto-scale" class="form-control stepper-display" name="auto-scale" type="number" value="0">
  			<span class="input-group-btn">
  				<button class="btn btn-success btn-plus stepper" type="button">+</button>
  			</span>
    		</div>
  		</div>
  		<div class="form-group col-md-4">
  		<label>Cubes Placed on the Switch </label>
  		<div class="input-group">
  			<span class="input-group-btn">
  				<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  			</span>
  				<input id="auto-switch" class="form-control stepper-display" name="auto-switch" type="number" value="0">
  			<span class="input-group-btn">
  				<button class="btn btn-success btn-plus stepper" type="button">+</button>
  			</span>
    		</div>
  		</div>
  	</div>


  <!-- 	Tele	 -->
  <div class="col-md-12">
  	<h2 class="text-center underlined">Tele-Operated</h2>
  </div>
  <div class="col-md-12">
  	<!-- 	Offensive Switch	 -->
  	<div class="col-md-6">
  	<div class="col-md-12">
  		<div class="form-group col-md-12">
  			<h4 class="text-center underlined">Offense Switch</h4>

  			<label>Switch Success</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-o-switch-s"  class="form-control stepper-display" name="tele-o-switch-s" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>
  </div>
  <div class="col-md-12">
  		<div class="form-group col-md-12">
  			<label class="text-center">Switch Fail</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-o-switch-f" class="form-control stepper-display" name="tele-o-switch-f" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>
  	</div>
  </div>
  <div class="col-md-6">
  	<!-- 	Offensive Scale	 -->
  	<div class="col-md-12">
  <div class="form-group col-md-12">
  			<h4 class="text-center underlined">Offense Scale</h4>
  			<label>Scale Success</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-o-scale-s" class="form-control stepper-display" name="tele-o-scale-s" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>
  	</div>
  <div class="col-md-12">
  		<div class="form-group col-md-12">
  			<label>Scale Fail</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-o-scale-f" class="form-control stepper-display" name="tele-o-scale-f" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>
  	</div>
  </div>
  </div>
  	<!-- 	Defensive Switch	 -->
  <div class="col-md-12">
  	<h4 class="text-center underlined">Switch Defense</h4>
  		<div class="form-group col-md-12">
  			<label>Switch Success</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-d-switch-s" class="form-control stepper-display" name="tele-d-switch-s" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>

  		<div class="form-group col-md-12">
  			<label>Switch Fail</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-d-switch-f" class="form-control stepper-display" name="tele-d-switch-f" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>
  </div>

  	<!-- 	Collection	 -->
  	<h2 class="text-center underlined">Cube Collection</h2>
  <div class="col-md-12">
  		<div class="form-group col-md-6">
  			<label>Ground Success</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-cube-ground-s" class="form-control stepper-display" name="tele-cube-ground-s" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  				</div>
  		</div>
  		<div class="form-group col-md-6">
  			<label>Ground Fail</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-cube-ground-f" class="form-control stepper-display" name="tele-cube-ground-f" type="number" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  				</div>
  		</div>
  	</div>
  	<div class="col-md-12">
  		<div class="form-group col-md-6">
  			<label>Chute Success</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-cube-chute-s" class="form-control stepper-display" name="tele-cube-chute-s" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>

  		<div class="form-group col-md-6">
  			<label>Chute Fail</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-cube-chute-f" class="form-control stepper-display" name="tele-cube-chute-f" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>
  	</div>

  	<!-- 	Exchange	 -->
  	<h2 class="text-center underlined">Exchange</h2>
  		<div class="form-group col-md-12">
  			<label>Exchange Success</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-exchange-s" class="form-control stepper-display" name="tele-exchange-s" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>

  		<div class="form-group col-md-12">
  			<label>Exchange Fail</label>
  			<div class="input-group">
  				<span class="input-group-btn">
  					<button class="btn btn-danger btn-minus stepper" type="button">–</button>
  				</span>
  					<input id="tele-exchange-f" class="form-control stepper-display" name="tele-exchange-f" type="number" value="0">
  				<span class="input-group-btn">
  					<button class="btn btn-success btn-plus stepper" type="button">+</button>
  				</span>
  	  		</div>
  		</div>
  	<!-- 	End Game	 -->
  	<h2 class="text-center underlined">End Game</h2>
  	<div class="col-md-12">
  		<div class="form-group col-md-4">
  			<label>Help Other Climb</label>
  			<div class="switch-field">
  				<input name="eg-hoc" id="eg-hoc_yes" type="radio" value="yes"/>
  				<label for="eg-hoc_yes">Yes</label>
  				<input name="eg-hoc" id="eg-hoc_no" type="radio" value="no" checked/>
  				<label for="eg-hoc_no">No</label>
  			</div>
  		</div>

  		<div class="form-group col-md-4">
  			<label>Climb on Other Bot</label>
  			<div class="switch-field">
  				<input name="eg-coob" id="eg-coob_yes" type="radio" value="yes"/>
  				<label for="eg-coob_yes">Yes</label>
  				<input name="eg-coob" id="eg-coob_no" type="radio" value="no" checked/>
  				<label for="eg-coob_no">No</label>
  			</div>
  		</div>

  		<div class="form-group col-md-4">
  			<label>Park</label>
  			<div class="switch-field">
  				<input name="eg-park" id="eg-park_yes" type="radio" value="yes"/>
  				<label for="eg-park_yes">Yes</label>
  				<input name="eg-park" id="eg-park_no" type="radio" value="no" checked/>
  				<label for="eg-park_no">No</label>
  			</div>
  		</div>
  </div>
  	<div class="col-md-12">
  		<div class="form-group col-md-4">
  			<label>Climb</label>
  			<div class="switch-field">
  				<input name="eg-climb" id="eg-climb_yes" type="radio" value="yes"/>
  				<label for="eg-climb_yes">Yes</label>
  				<input name="eg-climb" id="eg-climb_no" type="radio" value="no" checked/>
  				<label for="eg-climb_no">No</label>
  			</div>
  		</div>
  		<div class="form-group col-md-4">
  			<label>Levitate</label>
  			<div class="switch-field">
  				<input name="eg-levi" id="eg-levi_yes" type="radio" value="yes"/>
  				<label for="eg-levi_yes">Yes</label>
  				<input name="eg-levi" id="eg-levi_no" type="radio" value="no" checked/>
  				<label for="eg-levi_no">No</label>
  			</div>
  		</div>
  		<div class="form-group col-md-4">
  			<label>How do they climb?</label>
  			<select name="eg-style" class="form-control">
  				<option value="N/A">No climb</option>
  				<option value="rung">Rung</option>
  				<option value="sides">Side bar</option>
  				<option value="other">Other, specify in notes</option>
  			</select>
  		</div>
  	</div>
  	<div class="form-group">
  		<label for="match_notes">Match Notes</label>
  		<input class="form-control" id="match-notes" type="textarea" name="match-notes" autocomplete="off" placeholder="Anything wierd happen?">
  	</div>
  	<!-- 	Submit -->
  	<div class="submit">
  		<input type='submit' class="btn btn-block btn-success" name='submit' value='Submit'>
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
