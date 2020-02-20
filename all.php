

<?php
include ("connection.php");
        echo'<div class="container">';
        echo'<div class="row">';
          $all="select * from item";
          $res=mysqli_query($con,$all);
          $val=mysqli_num_rows($res);
          $sql="select * from item limit 6,$val";
          $res=mysqli_query($con,$sql);
      if(mysqli_num_rows($res)>0){
          while($arr=mysqli_fetch_assoc($res)){
         echo '<div class="col-lg-4 col-md-6 mb-4">';
            echo '<div class="card-h-100">';
              echo '<a href="#"><img class="d-block img-fluid" src="data:image/jpeg;base64,'.base64_encode( $arr['image'] ).'"</a>';

//src="data:image/jpeg;base64,'.base64_encode( $row['images'] ).'"/>';


             echo '<div class="card-body">';
                echo '<h4 class="card-title">';
                  echo $arr["name"];
                echo '</h4>';
              echo $arr["price"];
                echo '<p class="card-text">'.$arr["description"].'</p>';
              echo '</div>';
              echo '<div class="card-footer">';
                echo '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';

                echo '<div class="float-right"><button type="button" class="btn btn-success btn-sm" id="view">Add to cart</button>';
                echo '&nbsp;&nbsp;<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#details">View details</button></div>';

               
                echo'
            <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="details"> $arr["name"] </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>';


              

              echo'</div>';
            echo '</div>';
          echo '</div>';  
         }
  }
  echo '</div>';
        ?>