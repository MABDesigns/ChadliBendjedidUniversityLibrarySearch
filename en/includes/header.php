<?php ?>
<style>
    .logo-header {
	background: linear-gradient(rgba(62, 63, 64, 0.6), rgba(62, 63, 64, 0.6)), url("../includes/library.jpg") !important;
	background-size: cover;
	background-position: center bottom;
	color: #fff;
	padding-top: 150px;
	padding-bottom: 100px;
}

.logo-header h1 {
	font-size: 3rem;
	font-weight: 300;
	margin: 0 auto 0.2em auto;
}

.logo-header p {
	font-size: 1.15rem;
	width: 80%;
	margin: 0 auto 2em auto;
}

.logo-header .logo {
	margin: 0 auto 1em auto;
}

.logo-header .btn {
	padding: 10px 26px;
	background-color: #BFB8AD;
	color: #8A3033;
    font-size: 2.1rem;
	display: inline-block;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	text-decoration: none;
	border: solid 2px #8A3033;
	border-radius: 2px;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
}

.logo-header .btn:hover {
	color: #FFF;
	background-color: #8A3033;
	border-color: #8A3033;
}

@media (min-width: 992px) {
	.logo-header {
		height: 100vh;
		padding-top: 0;
		padding-bottom: 0;
	}
	.logo-header h1 {
		font-size: 4rem;
	}
	.logo-header p {
		width: 60%;
	}
}

@media (max-width: 480px) {
	.logo-header h1 {
		font-size: 2.4rem;
	}
}
</style>
<section class="logo-header">
   <div class="container h-100">
      <div class="row h-100 align-items-center">
         <div class="col-12 col-md-12 text-center header-content">
            <img src="../includes/logo.png" width="200" height="160" class="img-fluid logo" alt="logo">
            <h1>Let's Make Reading Fast And Easy.</h1>
            <p>We Offer a Huge Collection of Books, Articles, Researches and Documents. Check for Availability Now !</p>
            <p>
               <a class="btn btn-primary rounded" href="../search/">Search Now</a>
            </p>
         </div>
      </div>
   </div>
</section>