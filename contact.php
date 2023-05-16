<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <link rel="stylesheet" href="style(contact).css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>

/* General styling */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.themain {
  background-color: bisque;
  font-family: sans-serif;
  font-size: 16px;
  line-height: 1.6;
  display: flex;
  margin-left: 20px;
  justify-content: right;
  align-items: center;
  height: 100vh;
}

h2 {
  font-size: 2.2rem;
  font-weight: 600;
  margin-bottom: 1.5rem;
  text-align: center;
}

.container {
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 5rem auto;
  max-width: 600px;
  padding: 3rem;
  width: 90%;
}

.box {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}

.contactUs {
  width: 80%;
}

/* Media queries for responsiveness for general styling */
@media screen and (max-width: 768px) {
  .container {
    margin: 3rem auto;
    padding: 2rem;
  }

  .contactUs {
    width: 100%;
  }
}

/* Form styling */
form {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-top: 1rem;
  width: 100%;
}

.formBox {
  width: 100%;
}

.row50 {
  display: flex;
  justify-content: space-between;
  width: 100%;
}

.row50 .inputBox {
  width: calc(50% - 1rem);
}

.row100 .inputBox {
  width: 100%;
}

.inputBox {
  margin-bottom: 1.5rem;
  position: relative;
}

.inputBox span {
  color: #333;
  display: block;
  font-size: 1rem;
  margin-bottom: 0.5rem;
}

.inputBox input,
.inputBox textarea {
  background-color: #f8f8f8;
  border: none;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1) inset;
  color: #333;
  font-size: 1rem;
  padding: 1rem;
  width: 100%;
}

.inputBox input:focus,
.inputBox textarea:focus {
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2) inset;
  outline: none;
}

.inputBox textarea {
  height: 150px;
  resize: none;
}

.inputBox input[type="submit"] {
  background-color: #002a52;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  font-size: 1rem;
  padding: 1rem 2rem;
  transition: 0.2s;
}

.inputBox input[type="submit"]:hover {
  background-color: #a8cef5;
}

/* Media queries for responsiveness for form styling */
@media screen and (max-width: 768px) {
  .formBox,
  .row50 .inputBox,
  .row100 .inputBox {
    width: 100%;
  }
  
  .row50 .inputBox {
    margin-bottom: 1rem;
  }
}
 /* Info styling */
.infoBox {
  margin-top: 1px;
  text-align: left;
  width: 100%;
  color: white;
}

.infoBox div {
  display: flex;
  align-items: center;
  margin-bottom: 1px;
  color: white;
}

.infoBox div span {
  color: white;
  font-size: 1.5rem;
  margin: 0 10px 0 0;
  display: inline-block;
  width: 30px;
  height: 30px;
  border-radius: 50px;
  text-align: center;
  background-color: rgb(67, 180, 255);
  line-height: 30px;
}

.infoBox div p {
  color: white;
  font-size: 1rem;
  margin: 1px;
}

.infoBox div a {
  color: white;
  font-size: 1rem;
  margin: 1px;
  display: inline-block;
  border-radius: 50px;
  text-align: center;
  line-height: 30px;
}

/* Media queries for responsiveness for Info styling*/
@media screen and (max-width: 768px) {
  .infoBox {
    text-align: center;
  }

  .infoBox div {
    flex-direction: column;
    align-items: center;
    margin-bottom: 10px;
  }

  .infoBox div span {
    margin-right: 0;
  }
}

/* Social media icons */
.sci {
  display: flex;
  justify-content: flex-start;
  list-style: none;
  padding: 0;
  margin-top: 1rem;
}

.sci a {
  font-size: 2rem;
  color: rgb(207, 207, 207);
  margin: 0 10px;
}

/* Media queries for responsiveness for social media icons */
@media screen and (max-width: 768px) {
  .sci a {
    font-size: 1.5rem;
  }
  
  /* Adjusts the spacing */
  
  .sci a {
    margin: 0 5px;
  }
}

/* Additional media queries for further responsiveness */
@media screen and (max-width: 480px) {
  .sci a {
    font-size: 1rem;
  }
}

/* Contact info styling */
.contactInfo {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 1.5rem;
    padding: 2rem;
    width: calc(50% - 1rem);
  }
  
  .contactInfo h3 {
    color: white;
    font-size: 1.5rem;
    margin-bottom: 1rem;
  }
  
  .contactInfo p {
    color: white;
    font-size: 1rem;
    margin-bottom: 0.5rem;
  }

/* square colors */

  .contact.form {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 50px;
    width: 60%;
    margin: 20px;
  }
  
  .contact.info {
    background-color: rgb(1, 58, 94);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 35%;
  }

/* map */
  .map-container {
    position: relative;
    width: 100%;
    padding-bottom: 39%; /* 16:9 aspect ratio (change this value according to your map aspect ratio) */
    height: 0;
  }
  
  .map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

</style>
</head>

<body>


<!-- Side nav -->
<div class="flex-column p-3 bg-light" style="width: 280px; height: 750px; z-index: 1000; position: absolute;">
      <!-- Account  -->
      <div class="m-3">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
                  <strong><?php session_start();
                      echo $_SESSION['email'];
                      $users_id = $_SESSION['id']; ?></strong>
              </a>
      </div>
      <hr>

      <!-- Pages -->
      <ul class="nav nav-pills flex-column" style="margin-bottom: 510px;">
      <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                </svg>
                  Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                </svg>
                  About</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                  Contact</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-prescription" viewBox="0 0 16 16">
                      <path d="M5.5 6a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 1 0V9h.293l2 2-1.147 1.146a.5.5 0 0 0 .708.708L9 11.707l1.146 1.147a.5.5 0 0 0 .708-.708L9.707 11l1.147-1.146a.5.5 0 0 0-.708-.708L9 10.293 7.695 8.987A1.5 1.5 0 0 0 7.5 6h-2ZM6 7h1.5a.5.5 0 0 1 0 1H6V7Z"/>
                      <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1V1Zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4H4ZM3 3h10V1H3v2Z"/></svg>
                  Shop</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg>
                  Cart</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z"/></svg>
                  Receipt</a>
          </li>
      </ul>

      <!-- Sign out -->
      <hr>
      <ul class="nav nav-pills flex-column">
          <li class="nav-item">
              <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
              </svg>
                  Sign out</a>
          </li>
      </ul>
  </div>

<div class = "themain">
    <div class="contactUs">
        <div class="title">
            <h2 style="font-size: 50px;">Get in Touch with Us!</h2>
        </div>
        <div class="box">
            <!-- form -->
            <div class="contact form">
                <h3>Send a Message</h3>
                <form>
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>First Name</span>
                                <input type="text" placeholder="Enter your first name">
                            </div>
                            <div class="inputBox">
                                <span>Last Name</span>
                                <input type="text" placeholder="Enter your last name">
                            </div>
                        </div>

                        <div class="row50">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" placeholder="Enter your email address">
                            </div>
                            <div class="inputBox">
                                <span>Mobile</span>
                                <input type="text" placeholder="Enter your mobile number">
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <span>Message</span>
                                <textarea placeholder="Write your message here..."></textarea>
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- info box -->
            <div class="contact info">
                <h3 style="color: white; font-size: 30px;">Contact Info</h3>
                <div class="infoBox">
                    <div>
                        <p>Hi there, we are available 24/7 by fax, e-mail or by phone.
                            Drop us line so we can talk further regarding your inquiries.</p>
                    </div>
                    <br>
                    <div>
                        <p>For more info or inquiry about our products, project, and pricing
                            please feel free to get in touch with us</p>
                    </div>
                    <br>

                    <div>
                        <span><ion-icon name="location"></ion-icon></span>
                        <p>Mandaue City, Cebu <br>Philippines</p>
                    </div>
                    <br>
                    <div>
                        <span><ion-icon name="mail"></ion-icon></span>
                        <a href="mailto:loremipsum@gmail.com">loremipsum@gmail.com</a>
                    </div>
                    <br>
                    <div>
                        <span><ion-icon name="call"></ion-icon></span>
                        <a href="tel:+0932456789">+093 245 6789</a>
                    </div>
                    <br>

                    <!-- Social Media Links -->

                    <ul class="sci">
                        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    </ul>
                </div>


                <!-- maps -->

                <div class="contact map">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62799.24886534574!2d123.94501095!3d10.345639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99889680ceefd%3A0xa9f911a1f5dda572!2sMandaue%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1682078438104!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>




                <!-- icons -->

                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                        </div>

</body>

</html>