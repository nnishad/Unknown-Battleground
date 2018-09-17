<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','pubg');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);


$result = mysqli_query($con,"SELECT * FROM results");  //query

while ($row = mysqli_fetch_array($result)){
    echo"
        <li class='matchBox'>
                    <div class='teams'>
                        <a href='#'>
                            <img src='wp-content/winner.jpg' alt='Team&#039;s logo'>
                            <span>Battle 1</span>
                        </a>
                        
                    </div>
                    <!-- /TEAMS -->

                    <div class='rightBox'>
                        <div class='match-info'>
                            <span class='league'>SL i-League StarSeries S3</span>
                            <div class='status'>
                                <br></div>
                            <span class='date'>16 June at 02:05 AM</span>

                        </div>
                        <!-- /MATCH INFO -->
                    </div>
                    <div class='rightBox'>
                        <span class='tag'>#1</span>
                        <div class='match-info'>
                            <span class='league'>Adam Rex</span>
                            <div class='status'>
                                nikhilmishad@gmail.com</div>
                            <span class='fee'>1000</span>

                        </div>
                        <!-- /MATCH INFO -->
                    </div>
                    <div class='rightBox'>
                        <span class='tag'>#2</span>
                        <div class='match-info'>
                            
                            <span class='league'>Adam Rex</span>
                            <div class='status'>
                                nikhilmishad@gmail.com</div>
                            <span class='fee'>500</span>

                        </div>
                        <!-- /MATCH INFO -->
                    </div>
                    
                </li>
        ";
    }                 
?>