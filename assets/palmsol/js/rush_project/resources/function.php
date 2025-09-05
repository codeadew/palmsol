<?php 


/*HELPER FUNCTION START*/
 
function redirect ($location){
    header("Location: $location");
}
function send_query ($conn,$sql){
    return mysqli_query($conn, $sql);
}
function confirm ($send_query){
    global $conn;
    if(!$send_query){
        die("query failed" . mysqli_error($conn));
    }
}
function escape_string ($sql){
    global $conn;
    return mysqli_real_escape_string($conn, $sql);
}
function fetch_array ($result){
    global $conn;
    return mysqli_fetch_array($result);
}
/*HELPER FUNCTION START*/


function top_deal(){
    global $conn;
    $few_list_destination = send_query ($conn, "SELECT * FROM flights.flight_details");
    confirm($few_list_destination);
    while($row = mysqli_fetch_array($few_list_destination)){
        $display_top_deal = <<<DELIMETER

        <div class="common_card_four">
                            <div class="common_card_four_img">
                                <a href="tour-search.html">
                                    <img src="{$row['destination_images']}" width="330" height="250" alt="img">
                                </a>
                            </div>
                            <div class="common_card_four_text">
                                <ul class="common_card_four_list">
                                    <li>7 nights 8 days tour <i class="fas fa-circle"></i></li>
                                    <li>/ person</li>
                                </ul>
                                <h3><a href="tour-search.html">{$row['flight_description']}</a></h3>
                                <p><i class="fas fa-map-marker-alt"></i>{$row['from_location']}</p>
                                <div class="common_card_four_bottom">
                                <div class="common_card_four_bottom_right">
                                    <h4>Price starting from :</h4> 
                                    </div>
                                    <div class="common_card_four_bottom_left">
                                    <strong>  <p> ₦{$row['flight_rate']} </p></strong>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        

        DELIMETER;
        echo $display_top_deal;

    }
}

?>