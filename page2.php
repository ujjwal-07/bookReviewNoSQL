<?php 

    include_once 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style >
    div {
  background-image: url('assets/img/2bg.jpg');
}
    .boxb{
        border: 2px solid red;
    }
    .boxr{
        border: 2px solid green;
    }
    .bg-star{
        color: #ebb40e;
       
    }
    .card{
        -webkit-box-shadow: 0px 2px 5px -1px rgba(122,122,122,1);
        -moz-box-shadow: 0px 2px 5px -1px rgba(122,122,122,1);
        box-shadow: 0px 2px 5px -1px rgba(122,122,122,1);

    }
    footer{
        margin-top:30px;
        padding-top:60px;
        padding-bottom: 60px;
        background-color: #ffffff;
 }

    h3 {
      text-decoration: underline;
    }

    h4 {
      text-decoration: underline overline;
    }
</style>

	<title></title>
</head>
<body>



    <?php
        $sql = "SELECT * FROM reviewformtable;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck>0)
        {   echo "<div class='container'>
                    <div class='row'>";
            while($row = mysqli_fetch_assoc($result))
            {
                        echo
                        "<div class='col-lg-6'><div class='card mt-4 mr-3' style='width: 30rem;'>
                        <img src='2.jpg' class='card-img-top' alt=''>
                        <div class='card-body'>";
                echo "<h3 class='card-title  '>". $row["bookname"]."<hr></h3>"
                ."<i class='fa fa-star bg-star' aria-hidden='true'></i>
                    <i class='fa fa-star bg-star' aria-hidden='true'></i>
                    <i class='fa fa-star bg-star' aria-hidden='true'></i>
                    <i class='fa fa-star-half bg-star' aria-hidden='true'></i>
                    <i class='fa fa-star-o bg-star' aria-hidden='true'></i>"
                . "<p class='card-text'>Written by- ". $row["username"]. "</p>"
                . "<p class='card-text'>Genre-".$row["genre"]. "</p>"
                . "<p class='card-text'>Publisher-". $row["publisher"]. "</p>"
                . "<p class='card-text'>Year-". $row["publicationyear"]. "</p>"
                . "<p class='card-text'>" . $row["bookreview"]. "</p>"
                ."<a href='https://www.amazon.in/Books/b?ie=UTF8&amp;node=976389031?_encoding=UTF8&amp;camp=1789&amp;creative=9325&amp;linkCode=ur2&amp;tag=storypodca-20&amp;linkId=2P4S6EY6B462X4AR' target='_blank' rel='noopener noreferrer' style='border:none;text-decoration:none'><img src='https://www.niftybuttons.com/amazon/amazon-button2.png'></a>
                    <a href='#' class='badge badge-pill badge-primary pt-2 pb-2 pl-3 pr-3'>Buy Now</a>
                    <i class='fa fa-heart text-danger ml-3' style='font-size: 25px'></i>"
                ;
                echo "</div>
                </div>
            </div>";
            }
            echo"</div>
                </div>";

        }
        else{
            echo "0 result";
        }
        $conn->close();
    ?>


</body>
</html>