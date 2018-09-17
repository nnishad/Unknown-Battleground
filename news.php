<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','pubg');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);


$result = mysqli_query($con,"SELECT * FROM news");  //query

$i=0;
while ($row = mysqli_fetch_array($result)){
    if($i<2){
        echo "
            <article class='news-box large post-143 post type-post status-publish format-standard has-post-thumbnail hentry category-overwatch' style='background-image: url(wp-content/uploads/2017/06/post$i".".jpg);' onclick='window.location = \'renegades-defeat-signature-to-minor-playoffs/index.html\''>
                <a href='category/overwatch/index.html' class='category'>
                   #$row[news_id]						</a>

                <div class='details'>
                    <a href='renegades-defeat-signature-to-minor-playoffs/index.html'>
                        $row[news_heading]							</a>

                    <span class='date'>
                                $row[news_date]                                                            </span>
                </div>
                <!-- /DETAILS -->
            </article>
        ";
        }
 else {
            echo "
                <article class='news-box post-137 post type-post status-publish format-standard has-post-thumbnail hentry category-dota2' style='background-image: url(wp-content/uploads/2017/06/post$i".".jpg);' onclick='window.location = 'dh-valencia-and-atlanta-qualifiers-announced/index.html''>


                <div class='details'>
                    <a href='category/dota2/index.html' class='category'>
                        #$row[news_id]								</a>

                    <a href='dh-valencia-and-atlanta-qualifiers-announced/index.html'>
                        $row[news_heading]							</a>

                    <span class='date'>
                                $row[news_date]                                                            </span>
                </div>
                <!-- /DETAILS -->
            </article>
                ";    
        }
        $i++;
    }                 //fetch result
?>