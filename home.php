<?php include 'costumer-sidenav.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
  * {
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  background-image: url("images/autumn.gif");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 90px;
  margin: 0;
  padding: 0;
}

.main-content {
  display: flex;
  margin-left: 200px; /* Adjust the width of the sidenav as per your needs */
}

.content {
  padding: 180px 50px 0px 150px; /* Adjust the padding to create space for the sidebar */
}

.content h1 {
  font-family:  "Poppins", sans-serif; /* Add this line to set the font family */
  font-size: 70px;
  color: white;
  margin-bottom: 20px; /* Add this line to provide some spacing below the heading */
  font-weight: 700;
}

.content p {
  font-size: 19px;
  color: white;

}

.home-button {
  display: inline-block;
  padding-top: 0.2px;
  font-size: 20px;
  color: black;
  text-decoration: none;
  margin-right: 5px;
}

.get-started-button {
  display: block;
  padding: 8px 18px;
  font-size: 15px;
  background-color: #eee2cb;
  color: black;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.signup-button {
  display: inline-block;
  padding: 8px;
  font-size: 15px;
  background-color: #eee2cb;
  color: black;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  vertical-align: middle;
  margin-top: 5px;
  margin-left: 5px;
}

.icon {
  display: inline-block;
  vertical-align: middle;
  width: 30px;
  height: 30px;
  margin-left: 10px;
  margin-top: 17px;
  font-size: 30px;
  position: 100px;
}

.header-container {
  display: flex;
  align-items: center;
}

.get-started-button:hover {
  transform: scale(1.05);
  box-shadow: 0 0 10px black;
  transition: all 0.10s ease-in-out;
}

.home-button:hover .logo-text {
  text-shadow: 1px 1px black;
  transition: color 0.1s ease, text-shadow 0.1s ease;
}

.content h1:hover {
  color: white;
  text-shadow: 0 0 10px white;
  transition: color 0.5s ease, text-shadow 0.5s ease;
}

.content p:hover {
  color: white;
  text-shadow: 0 0 10px white;
  transition: color 0.5s ease, text-shadow 0.5s ease;
}

.icon-container {
    position: absolute;
    bottom: 10px;
    left: 60%;
    transform: translateX(-50%);
    z-index: 1; /* This places the icon above the background image */
}
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 200px; /* Adjust the left margin to match the width of the sidebar */
  background-color: #EEE2CB;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #000000;
  display: block;
}
.sidenav a:hover {
  background-color: #ddd;
}
</style>

  <meta charset="UTF-8" />
  <title>Homepage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="main-content">
    <div class="content">
      <h1>Healing the hope of the future.</h1>
      <p>Your health is our top priority. With our expert knowledge
        <br> and high-quality products, we are committed to providing safe and effective
        <br> solutions for your well-being.
      </p>
      <button class="get-started-button">Explore More →</button>
    </div>
    <div class="icon-container">
      <img src="images/heart.png" alt="Icon 1" class="icon">
      <img src="images/nurse.png" alt="Icon 2" class="icon">
      <img src="images/syringe.png" alt="Icon 3" class="icon">
      <img src="images/pulse.png" alt="Icon 4" class="icon">
      <img src="images/health_book.png" alt="Icon 5" class="icon">
      <img src="images/pharma.png" alt="Icon 6" class="icon">
    </div>
  </div>
</body>

</html>
