<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <?php
      require("cnx.php");
      include "agent-list.php";

      function delete($ida){
          require("cnx.php");
          $sql="DELETE FROM agent WHERE id =$ida";
          return $c=mysqli_query($con,$sql);
          
          ;
      }
		 if(isset($_GET['ida'])){
    delete($_GET['ida']);
         }
    ?>
    