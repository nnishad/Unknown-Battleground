<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','pubg');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);


$result = mysqli_query($con,"SELECT * FROM battle");  //query
$status="";
$i=0;
while ($row = mysqli_fetch_array($result)){
        //fetch result
        if($row['b_reg_user']<'100'){
            $status="Online";
            $register="
                     
                <a  data-modal='#modal$row[b_id]' class='modal__trigger'>Modal 1</a>

                
                    <div id='modal$row[b_id]' class='modal modal__bg' role='dialog' aria-hidden='true'>
		<div class='modal__dialog'>
			<div class='modal__content'>
                        <div class='cd-user-modal-container'> <!-- this is the container wrapper -->
                    <ul class='cd-switcher'>
                        <li><a  id='payment$row[b_id]' class='cd-switcher-active'>Make Payment</a></li>
                        <li><a  id='reg$row[b_id]'>Register</a></li>
                    </ul>
                    </div>
                    <div id='tab$row[b_id]1' style='text-align:center'>
                        
                        <div class='teams'>
                        <a >
                            <img src='https://goforsmurf.com/wp-content/uploads/2017/11/cropped-pubg-logo.png' style='width:50px' alt='Team&#039;s logo'>
                            <span><h3>Make payment for </h3>Battle $row[b_id]</span>
                        </a>
                        <p>* Don't forget to copy order number after successfull payment.</p>
                    </div>
                        <iframe src='https://securegw.paytm.in/link/66062/LL_189307' frameborder='0' width='500'></iframe>
                        </div>
                    <div id='tab$row[b_id]2' style='display:none'>
                        <p style='text-align:center'>* Enter your Paytm transaction order number in Paytm Order Id field.</p>
                        <form action='' class='cd-form' method='POST'>
								<p class='fieldset'>
								  <label class='image-replace cd-username' for='sname'>Name :</label>
									<input type='text' class='full-width has-padding has-border' name='sname' placeholder='Name' class='form-control' required>
								</p>
									<p class='fieldset'>
								  <label class='image-replace cd-email' for='email'>Email-id :</label>
									<input type='email' class='full-width has-padding has-border' name='email' placeholder='Email' class='form-control' required>
								</p>
									<p class='fieldset'>
								  <label class='image-replace cd-pusername' for='pusername'>PUBG Username :</label>
									  <input type='text' class='full-width has-padding has-border' name='pusername' placeholder='PUBG Username' class='form-control' required>
								</p>
								<p class='fieldset'>
								  <label class='image-replace cd-mobile' for='reg'>Registration number :</label>
									<input type='text' class='full-width has-padding has-border' name='reg' placeholder='Registration number' class='form-control' required>
								</p>
								<p class='fieldset'>
								  <label class='image-replace cd-paytm' for='tid'>PayTM Order ID :</label>
									<input type='text' class='full-width has-padding has-border' name='tid' placeholder='PayTM Order ID' class='form-control' required>
								</p>
								<p class='fieldset'>
                                <input type='checkbox' id='accept-terms' required>
                                <label for='accept-terms'>I agree to the <a href='#0'>Terms</a></label>
                            </p>
								<p class='fieldset'>
								<input type='submit' class='full-width has-padding' value='Register'>
								</p>
						</form>
                    </div>
				
				<!-- modal close button -->
				<a  class='modal__close demo-close'>
					<svg class='' viewBox='0 0 24 24'><path d='M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z'/><path d='M0 0h24v24h-24z' fill='none'/></svg>
				</a>
				
			</div>
		</div>

";
        }
 else {$status="Full";
 $register="<a class='cta-btn'>
                        Lobby Full
                    </a>";
 }
        echo "
            <li class='matchBox'>
                    <div class='teams'>
                        <a href='team/midnight-turtles/index.html'>
                            <img src='https://goforsmurf.com/wp-content/uploads/2017/11/cropped-pubg-logo.png' alt='Team&#039;s logo'>
                            <span>Battle $row[b_id]</span>
                        </a>
                    </div>
                    <!-- /TEAMS -->

                    <div class='rightBox'>
                        <div class='match-info'>
                            <span class='league'>$row[b_map], $row[b_type]</span>
                               
                            <div class='status'>
                                <span>$status</span> <div id='reg_user$row[b_id]'></div>/100                                    </div>

                            <span class='date'>$row[b_time]</span>
                        </div>
                        <!-- /MATCH INFO -->

                    </div>
                    <div class='rightBox'>
                        <div class='match-info match-info1'>
                            <span class='league'>Registration Ends At</span>
                           

                            <span class='date'>$row[b_reg_end_time]</span>
                        </div>
                        <!-- /MATCH INFO -->

                    </div>
                    <div class='rightBox'>
                        <div class='match-info match-info2'>
                            <span class='league'>Entry Fee</span>
                            <div class='status'>
                                <br>                        </div>

                            <span class='fee'>₹ $row[b_fee]/-</span>
                        </div>
                        <!-- /MATCH INFO -->

                    </div>
                    <div class='rightBox'>
                        <div class='match-info match-info3'>
                            <span class='league'>Winning Prize</span>
                            <div class='status'>
                                <br>                        </div>

                            <span class='fee'>₹ $row[b_prize]/-</span>
                        </div>
                        <!-- /MATCH INFO -->

                    </div>"
                . "<script> function check2(){
            $.ajax({    //create an ajax request to display.php
                type: 'GET',
                url: 'battle2.php',
                dataType: 'html',   //expect html to be returned
                success: function (response) {
                    $('#reg_user$row[b_id]').html(response);
                    //alert(response);
                }


            });
            setInterval(check2,1000);
        }</script>";
        echo "";
        echo "
                    $register
                </li>
            ";
        echo "        <script  src='login.js'></script>
    <script>
    $('#payment$row[b_id]').click(function(){
    $(this).addClass('cd-switcher-active');
    $('#reg$row[b_id]').removeClass('cd-switcher-active');
    $('#tab$row[b_id]2').css('display','none');
    $('#tab$row[b_id]1').css('display','block');
    })
    $('#reg$row[b_id]').click(function(){
    $(this).addClass('cd-switcher-active');
    $('#payment$row[b_id]').removeClass('cd-switcher-active');
    $('#tab$row[b_id]1').css('display','none');
    $('#tab$row[b_id]2').css('display','block');
    })
    </script>
";
}

?>