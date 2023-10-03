﻿<?php include 'inc/header.php'; ?>
  <!-- Breadcrumbs -->
  <?php 
    if (!isset($_GET['search']) || $_GET['search'] == NULL) {
      echo "<script>window.location = 'index.php';</script>";
    }
    else {
      $search = $_GET['search'];
    }

  ?>
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
             <li><strong>Search Result</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <div class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
          
          <div class="shop-inner">
            <div class="page-title">
              <h2>Search Result</h2>
            </div>
            <div class="product-grid-area">
              <ul class="products-grid">

                <?php 
                  $query = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR full_desc LIKE '%$search%'";
                  $product = $db->select($query);
                  if ($product) {
                      while ($result = $product->fetch_assoc()) {
                  
                ?>
                <li class="item col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-top: 30px;">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="pr-img-area"> <a title="Ipsums Dolors Untra" href="single-product.php?proId=<?php echo $result['id']; ?>">
                          <figure> <img style="height: 200px; width: 200px;" class="first-img" src="<?php
                                        if(strpos($result['product_img'], 'http') !== false){
                                            echo $result['product_img'];
                                        }else{
                                            echo 'admin/' . $result['product_img'];
                                        }
                                        ?>" alt=""> <img style="height: 200px; width: 200px;" class="hover-img" src="admin/<?php echo $result['product_img']; ?>" alt=""></figure>
                          </a>
                          <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                        </div>
                        <div class="pr-info-area">
                          <div class="pr-button">
                            <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                            <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                            <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Ipsums Dolors Untra" href="single-product.php?proId=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                             <div class="price-box">
                            <?php
                              if ($result['discount_price'] == 0) { ?>
                                 <p class="special-price"> <span class="price-label">Special Price</span> <span class="price">৳ <?php echo $result['regular_price']; ?></span> </p>
                         <?php   }else { ?>
                              <p class="special-price"> <span class="price-label">Special Price</span> <span class="price">৳ <?php echo $result['discount_price']; ?></span> </p>

                              <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">৳ <?php echo $result['regular_price']; ?></span> </p>
                          <?php  }

                             ?>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <?php } } ?>

             
               
              </ul>
            </div>

          </div>
        </div>
        <?php include 'inc/sidebar.php'; ?>
      </div>
    </div>
  </div>
  <!-- Main Container End --> 
  <!-- Footer -->
  <?php include 'inc/footer.php'; ?>