<style>
   /* Our Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');

/* Global */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins'
}

body {
  height: 100vh;
  background-color: #D3E1E1
}

/* The Receipt */
.receipt {
  width: 360px;
  height: 720px;
  background-color: white;
  border-radius: 30px;
  position: relative;
  top: 50%;
  left: 50%;
  margin-top: -360px; /* -half height and width to center */
  margin-left: -180px;
  box-shadow: 14px 14px 22px -18px;
  padding: 20px
}

/* Heading */
.name {
  text-transform: uppercase;
  text-align: center;
  color: #6c8b8e;
  letter-spacing: 10px;
  font-size: 1.8em;
  margin-top: 10px
}

/* Big thank */
.greeting {
  font-size: 21px;
  text-transform: capitalize;
  text-align: center;
  color: #6f8d90;
  margin: 35px 0;
  letter-spacing: 1.2px
}

/* Order info */
.order p {
  font-size: 13px;
  color: #aaa;
  padding-left: 10px;
  letter-spacing: .7px
}

/* Our line */
hr {
  border: .7px solid #ddd;
  margin: 15px 0;
}

/* Order details */
.details {
  padding-left: 10px;
  margin-bottom: 35px;
  overflow: hidden
}

.details h3 {
  font-weight: 400;
  color: #6c8b8e;
  font-size: 1.5em;
  margin-bottom: 15px
}

/* Image and the info of the order */
.product {
  float: left;
  width: 60%
}

.product img {
  width: 65px;
  float: left
}

.product .info {
  float: left;
  margin-left: 15px
}

.product .info h4 {
  color: #6f8d90;
  font-weight: 400;
  text-transform: uppercase;
  margin-top: 10px
}

.product .info p {
  font-size: 12px;
  color: #aaa;
}

/* Net price */
.details > p {
  color: #6f8d90;
  margin-top: 25px;
  font-size: 15px
}

/* Total price */
.totalprice p {
  padding-left: 10px
}

.totalprice .sub,
.totalprice .del {
  font-size: 13px;
  color: #aaa
}

.totalprice span {
  float: right;
  margin-right: 17px
}

.totalprice .tot {
  color: #6f8d90;
  font-size: 15px
}

/* Footer */
footer {
  font-size: 10px;
  text-align: center;
  margin-top: 135px; /* You can make it with position try it */
  color: #aaa
}

.button {
    background-color: #119ad8;
    border: none;
    color: white;
    padding: 5px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.text-center {
    text-align: center;
}

@media print {
    .button {
        display: none;
    }
}
</style>

<div class="receipt">
    <div class="text-center">
        <button onclick="window.print()" class="button">Print</button>
        <button onclick="history.back()" class="button">Back</button>
    </div>
<!-- Order info -->
<div class="order">

  <p> Stock Entry No : {{ $data->id }} </p>
  <p> Date : {{ date('d-m-Y', strtotime($data->created_at)) }} </p>
  <p> Customer : {{ $data->customer_name }} </p>
</div>

<hr>

<!-- Details -->
<div class="details">
  <div class="product">
    <div class="info">
      <h4> {{ optional($data->product)->name }} </h4>
      <p>Sold Qty: {{ $data->subqty }} </p>

    </div>

  </div>

  <p> {{ optional($data->product)->price * $data->subqty }} FCFA </p>
</div>
</div>
