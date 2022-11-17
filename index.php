<?php
session_start();
?>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="bootstrap.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <style type="text/css">
    .payment-form{
  padding-bottom: 50px;
  font-family: 'Montserrat', sans-serif;
}

.payment-form.dark{
  background-color: #f6f6f6;
}

.payment-form .content{
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  background-color: white;
}

.payment-form .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.payment-form .block-heading p{
  text-align: center;
  max-width: 420px;
  margin: auto;
  opacity:0.7;
}

.payment-form.dark .block-heading p{
  opacity:0.8;
}

.payment-form .block-heading h1,
.payment-form .block-heading h2,
.payment-form .block-heading h3 {
  margin-bottom:1.2rem;
  color: #3b99e0;
}

.payment-form form{
  border-top: 2px solid #5ea4f3;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  background-color: #ffffff;
  padding: 0;
  max-width: 600px;
  margin: auto;
}

.payment-form .title{
  font-size: 1em;
  border-bottom: 1px solid rgba(0,0,0,0.1);
  margin-bottom: 0.8em;
  font-weight: 600;
  padding-bottom: 8px;
}

.payment-form .products{
  background-color: #f7fbff;
    padding: 25px;
}

.payment-form .products .item{
  margin-bottom:1em;
}

.payment-form .products .item-name{
  font-weight:600;
  font-size: 0.9em;
}

.payment-form .products .item-description{
  font-size:0.8em;
  opacity:0.6;
}

.payment-form .products .item p{
  margin-bottom:0.2em;
}

.payment-form .products .price{
  float: right;
  font-weight: 600;
  font-size: 0.9em;
}

.payment-form .products .total{
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  margin-top: 10px;
  padding-top: 19px;
  font-weight: 600;
  line-height: 1;
}

.payment-form .card-details{
  padding: 25px 25px 15px;
}

.payment-form .card-details label{
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
  color: #79818a;
  text-transform: uppercase;
}

.payment-form .card-details button{
  margin-top: 0.6em;
  padding:12px 0;
  font-weight: 600;
}

.payment-form .date-separator{
  margin-left: 10px;
    margin-right: 10px;
    margin-top: 5px;
}

@media (min-width: 576px) {
  .payment-form .title {
    font-size: 1.2em; 
  }

  .payment-form .products {
    padding: 40px; 
    }

  .payment-form .products .item-name {
    font-size: 1em; 
  }

  .payment-form .products .price {
      font-size: 1em; 
  }

    .payment-form .card-details {
      padding: 40px 40px 30px; 
    }

    .payment-form .card-details button {
      margin-top: 2em; 
    } 
}
  </style>
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        
        <form action="done.php" method="POST">
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price">$200</span>
              <p class="item-name">Tomatoes</p>
              <p class="item-description">Lorem ipsum dolor sit amet</p>
            </div>
            <div class="item">
              <span class="price">$120</span>
              <p class="item-name">Chicken</p>
              <p class="item-description">Lorem ipsum dolor sit amet</p>
            </div>
            <div class="total">Total<span class="price">$<span id="total_price">320</span></span></div>
            <input type="hidden" name="total" id="total">
          </div>
          <div class="card-details">
            <h3 class="title">Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-12">
                <label for="card-number">Card Number</label>
                <input id="card-number" name="card-number" type="text" class="form-control" placeholder="Waiting to tap your card...." aria-label="Card Holder" aria-describedby="basic-addon1" readonly="true">
              </div>
              <div class="form-group col-sm-12">
                <button type="submit" name="submit" class="btn btn-primary btn-block" >Proceed</button>
                </form>
              </div>
            </div>
          </div>
        
      </div>
    </section>
  </main>
</body>
<script type="text/javascript">
  var a=document.getElementById("total_price").innerHTML;
  var url = "http://192.168.1.87";
  document.querySelector('input[name="total"]').value = a;
  console.log(a);

        function FetchData() {
            fetch(url + "/data")
                .then((result) => result.json())
                .then((data) => DisplayData(data));
        }

        function DisplayData(data) {
            document.getElementById("card-number").value = data.uid;
            console.log(data.uid);
            
        }
        setInterval(() => {
            FetchData();
        }, 5000);
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
?>