<?php
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $location = $_POST['location'];
   $guests = $_POST['guests'];
   $arrivals = $_POST['arrivals'];
   $leaving = $_POST['leaving'];
   if( !empty($name) || !empty($email) || !empty($phone) ||!empty($address) || !empty($location) || !empty($guests) ||!empty($arrivals) || !empty($leaving)){
   $servername = "localhost";
   $username ="root"
   $password ="";
   $dbname = "booking";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (mysqli_connect_error()){
      die('connect error('mysqli_connect_error().')'.mysqli_connect_error());
    } else{
      $SELECT = "SELECT email From register Where email = ? Limit 1";
      $INSERT = "INSERT Into register (name, email, phone, address, location, guests, arrivals, leaving) values(?,?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s",$email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if($rnum = 0){
         $stmt->close();
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("ssississ",$name,$email,$phone,$address,$location,$guests,$arrivals,$leaving);
         $stmt->execute();
         echo "New record inserted successfully";
      } else{
         echo "Someone already register using this email";
      }
      $stmt->close();
      $conn->close();
    }

    }else{
      echo "All field are required!";
      die();
    }

    

        $request = " insert into book_form(name, email, phone, address, location, guests, arrivals, leaving) values('$name','$email','$phone','$address','$where','$guests','$arrivals','$leaving') ";

        mysqli_query($connection, $request);

      header('location:book.php'); 

   }else{
      echo 'something went wrong please try again!';
   }
?>