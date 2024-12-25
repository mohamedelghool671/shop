
<?php include 'header.php' ?>
<?php include 'navbar.php' ;
include "dbConnection.php";?>


    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modern Deign</p>
        <div class="pro-container">

        <?php 
        
            $limit=4;
            if (isset($_GET['page'])) {
          $page=$_GET['page'];
            }else {
              $page=1;
            }
            
            $query="select count(id) as id from products ";
            $run_query=mysqli_query($connect,$query);
            $total_pages=mysqli_fetch_assoc($run_query)['id'];
            $numberPages=ceil($total_pages/$limit);
      


            if ($page < 1) {
              header("location:{$_SERVER['PHP_SELF']}?page=1");
          } elseif ($page > $numberPages) {
            header("location:{$_SERVER['PHP_SELF']}?page=$numberPages");
              
          }

          $offset=($page-1)*$limit;
        $selectProducts ="select * from `products` limit $limit offset $offset";
        $runSelectProducts=mysqli_query($connect,$selectProducts);
        $resultProducts=mysqli_fetch_all($runSelectProducts,MYSQLI_ASSOC);

        if(count($resultProducts)>0)
        {
            foreach($resultProducts as $product)
            { ?>
                <div class="pro">
                <!-- <form> -->
                <img src="admin/upload/<?php echo $product['image'] ;?>" alt="p1" />
                    <div class="des">
                    <h2><?php echo $product['title']; ?></h2>
                        <h5><?php echo $product['description']; ?></h5>
                        <div class="star ">
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <h4><?php echo $product['price']; ?></h4>
            <form method="post" action="inc/addToCart.php?id=<?php echo $product['id']; ?>">
                          
                              <input type="number" name="quantity" value=1>
                              <button type="submit" name="addCart" class="cart">
                                <i class="fas fa-shopping-cart"></i>
                              </button>
            </form>
                         
                    </div>
                    </div>

            <?php }
        }
        ?>
                        
              
            </div>
           
        </div>
    </section>
  
    


    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link <?php if ($page ==1) echo "disabled";?>" href="<?php echo $_SERVER['PHP_SELF']."?page=".($page-1);?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link <?php if ($page ==$numberPages) echo "disabled";?>" href="<?php echo $_SERVER['PHP_SELF']."?page=".($page+1);?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.php' ?>