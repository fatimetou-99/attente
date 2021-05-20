<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <?php
      require("cnx.php");

      function delete($ida){
          require("cnx.php");
          $sql="DELETE FROM abscence WHERE id_ab =$ida";
          return $c=mysqli_query($con,$sql);
          
          ;
      }
		 if(isset($_GET['idab'])){
    delete($_GET['idab']);
         }
    ?>
    