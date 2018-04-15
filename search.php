<?php  
 $connect = mysqli_connect("localhost", "root", "root", "test2");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM place WHERE city LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["city"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>City Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 
