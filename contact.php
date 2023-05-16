<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <link rel="stylesheet" href="style(contact).css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<style>
    
/* General styling */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  background-color: bisque;
  font-family: sans-serif;
  font-size: 16px;
  line-height: 1.6;
  display: flex;
  justify-content: center;
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


</body>

</html>