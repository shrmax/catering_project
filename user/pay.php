<?php
include_once 'partial/header.php';
$id=$_GET['pay'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Crafty Corner-Order</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Exatra -->
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- extra -->
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Flosun -->
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="CSS.css" rel="stylesheet"> -->
</head>

<body style="background-color: black;">
   
  <form action="include/payment.php" method="post">
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion" style="
                                width:1300px;
                                margin:auto;
                                overflow:hidden;
                                ">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                        <h4 class="mb-3">Payment</h4>
                                            <h5 class="panel-title mb-3">
                                                
                                                <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h5>
                                        </div>

                                        <!-- payment -->
                                       

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="upi" id="upi" onclick="cardform(this.value)" required>
                <label class="custom-control-label" for="credit">UPI/Netbanking</label>
                <div style="display: none;" id="upi_div">
                  <b>scan and pay</b>
                  <img src="https://th.bing.com/th/id/OIP.-I8JMVhpM31DO8sqEGpocgHaHa?w=187&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7">

                  <!-- transaction id input form-->
                  <div class="billing-address-form">
                    <p><input type="text" placeholder="Enter Transaction id" name="trans_id"></p>
                  </div>
                </div>
              </div>
              <!-- <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="cash" id="cash" onclick="cardform(this.value)" required>
                <label class="custom-control-label" for="debit">Cash on Delivery</label>
                <div style="display: none;" id="cash_div">
                  <b>pay when your receive item</b>
                </div>
              </div> -->
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="card" id="card" onclick="cardform(this.value)" required>
                <label class="custom-control-label" for="paypal">Debit card/Credit card</label>
                <div style="display: none;" id="card_div">
                  <!-- 🔴 card paymen  body starts -->
                  <div class="container d-flex  main">
                    <div class="card">
                     
                      <!-- <form action=""> -->
                      <div class="px-3 pt-3">
                        <label for="card number" class="d-flex justify-content-between"><span class="labeltxt">CARD NAME</span></label>
                        <input type="text" class="form-control inputtxt" id="cc-name" name="card_name" placeholder="CARD NAME"  >
                        <div class="invalid-feedback">
                          Name on card is required
                        </div>
                      </div>
                      <div class="px-3 pt-3">
                        <label for="card number" class="d-flex justify-content-between"><span class="labeltxt">CARD NUMBER</span><img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" width="25" class="image" /></label>
                        <input type="text" class="form-control inputtxt" id="card_no" name="card_no" placeholder="0000 0000 0000 0000" minlength="16" maxlength="16" >
                        <div class="invalid-feedback">
                          Credit card number is required
                        </div>
                      </div>


                      <div class="d-flex justify-content-between px-3 pt-4">
                        <div><label for="date" class="exptxt"> Expiry </label><input type="text" class="form-control expiry" placeholder="MM / YY" id="card_expiry" name="card_expiry" minlength="5" maxlength="5" >
                          <div class="invalid-feedback">
                            Expiration date required
                          </div>
                        </div>
                        <div><label for="cvv" class="cvvtxt">CVV / CVC</label><input type="text" name="cvv" class="form-control cvv" id="exp" minlength="3" maxlength="3" >
                          <div class="invalid-feedback">
                            Security code required
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between px-3 pt-4 pb-4">
                       
                      </div>
                      <!-- </form> -->
                    </div>
                  </div>
                                        <!-- end payment -->
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    
                                        <input type="hidden" value="<?php echo $_GET['amt']?>" name="tot">
                                        <input type="hidden" value="<?php echo $id?>" name="pid">
                                    <button class="btn flosun-button secondary-btn black-color rounded-0 w-100" type="submit" name="sub">Place Order</button>
                                  </div>
                                </form>

                                 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br><br><br><br>
    <!-- Product End -->
    

    <script>
    function cardform(myvalue) {

      if (myvalue == 'card') { //radio button id
        document.getElementById('card_div').style.display = 'block'; //div id
        document.getElementById('upi_div').style.display = 'none';
        document.getElementById('cash_div').style.display = 'none';
      } else if (myvalue == 'upi') {
        document.getElementById('card_div').style.display = 'none';
        document.getElementById('upi_div').style.display = 'block';
        document.getElementById('cash_div').style.display = 'none';
      } else {
        document.getElementById('card_div').style.display = 'none';
        document.getElementById('upi_div').style.display = 'none';
        document.getElementById('cash_div').style.display = 'block';
      }

    }
  </script>
  <script>
    (function() {
      'use strict'

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByTagName('form')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
      }, false)
    }())
  </script>


    <!-- Testimonial Start -->
    
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <?php
    //  include "mainfooter.php" 
     ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

</html>



<?php 
include_once 'partial/footer.php';
?>