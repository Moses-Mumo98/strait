<?php

// ---------------------------------------------------------------------------------------------------------------------
// Example of loading data from database
// ---------------------------------------------------------------------------------------------------------------------
$dataneeded='sd_r';
include('db.php');


// End of example ------------------------------------------------------------------------------------------------------
//print_r($data);
if( !empty($_POST['markers']) ){

    for( $i=0; $i < count($data); $i++){
        for( $e=0; $e < count($_POST['markers']); $e++){
			$latlong=str_replace("(","", $data[$i]['latlang']);
				$latlong=str_replace(")","",$latlong);
				$latlong=explode(',',$latlong);
				
				$status=$data[$i]['driver'];

				$statuscss='';
				if($data[$i]['status']==1){ $status='No Driver'; $statuscss='red';}
				
				$data[$i]['url']='#';
				$gallery[$i]["image"]='assets/img/items/10.jpg';
				$data[$i]['rating']=5;
				$reviewsNumber[$i]='1';
				
            if( $data[$i]['id'] == $_POST['markers'][$e] and $previous_id!=$data[$i]['id'] ){
				$previous_id=$data[$i]['id'];
                echo
                '<div class="result-item" data-id="'. $data[$i]['id'] .'" data-lat="'. $latlong[0] .'" data-lng="'. $latlong[1] .'" >';

                    // Ribbon ------------------------------------------------------------------------------------------

                    if( !empty($status) ){
                        echo
                            '<figure class="ribbon '.$statuscss.'">'. $status .'</figure>';
                    }

                    echo
                    '<a href="'. $data[$i]['url'] .'">';

                    // Title -------------------------------------------------------------------------------------------

                    if( !empty($data[$i]['name']) ){
                        echo
                            '<h3>'. $data[$i]['name'] .'</h3>';
                    }

                    echo
                        '<div class="result-item-detail">';

                            // Image thumbnail -------------------------------------------------------------------------

                            if( !empty($gallery[$i]["image"]) ){
                                echo
                                '<div class="image" style="background-image: url('. $gallery[$i]["image"] .')">';
                                    if( !empty($data[$i]['hire_type']) ){
                                        echo
                                        '<figure>'. $data[$i]['hire_type'] .'</figure>';
                                    }

                                    // Price ---------------------------------------------------------------------------

                                    if( !empty($data[$i]['vehicle_type']) ){
                                        echo
                                            '<div class="price">'. $data[$i]['vehicle_type'] .'</div>';
                                    }
                                echo
                                '</div>';
                            }
                            else {
                                echo
                                '<div class="image" style="background-image: url(assets/img/items/default.png)">';
                                    if( !empty($data[$i]['hire_type']) ){
                                        echo
                                        '<figure>'. $data[$i]['hire_type'] .'</figure>';
                                    }

                                    // Price ---------------------------------------------------------------------------

                                    if( !empty($data[$i]['vehicle_type']) ){
                                        echo
                                            '<figure class="price">'. $data[$i]['vehicle_type'] .'</figure>';
                                    }
                                echo
                                '</div>';
                            }

                            echo
                            '<div class="description">';
                                if( !empty($data[$i]['hailstamp']) ){
                                    echo
                                        '<h5><i class="fa fa-map-marker"></i>'.  periodtogramar($data[$i]['hailstamp'],date('Y-m-d H:i:s')) .'</h5>';
                                }

                                // Rating ------------------------------------------------------------------------------

                                if( !empty($data[$i]['rating']) ){
                                    echo
                                        '<div class="rating-passive"data-rating="'. $data[$i]['rating'] .'">
                                            <span class="stars"></span>
                                            <span class="reviews">'. $reviewsNumber[$i] .'</span>
                                        </div>';
                                }

                                // Category ----------------------------------------------------------------------------

                                if( !empty($data[$i]['vehicle_type']) ){
                                    echo
                                        '<div class="label label-default">'. $data[$i]['vehicle_type'] .'</div>';
                                }

                                // Description -------------------------------------------------------------------------

                                if( !empty($data[$i]['hailstamp']) ){
                                    echo
                                        '<p>'. $data[$i]['hailstamp'] .'</p>';
                                }
                            echo
                            '</div>
                        </div>
                    </a>
                    <div class="controls-more">
                        <ul>
                            <li><a href="#" class="add-to-favorites"  data-id="'. $data[$i]['id'] .'"  data-modal-external-file="modal_sign_in.php" >Assign Driver</a></li>
                            <li><a href="#" class="add-to-watchlist"  data-id="'. $data[$i]['id'] .'">Cancel Request</a></li>
                        </ul>
                    </div>
                </div>';

            }
        }
    }

}