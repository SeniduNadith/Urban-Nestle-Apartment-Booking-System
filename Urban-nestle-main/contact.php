<?php
include "database.php";
?>


<?php include "header.php"; ?>
        <div class="contact-slider">
            <div class="contact-item" id="first">
              <i class="fa-solid fa-location-dot fa-3x" style="color: #511f1f;"></i>
              <div class="contact-info">
                <h3>Visit Us</h3>
                <p>No: 378 Avissawella Rd, Wellampitiya 10600</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fa-solid fa-phone fa-3x" style="color: #5b1a1a;"></i>
              <div class="contact-info">
                <h3>Call Us</h3>
                <p>(+94) 11 7 167 167<br>(+94) 76 7 167 167</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fa-solid fa-envelope fa-3x" style="color: #511f1f;"></i>
              <div class="contact-info">
                <h3>Email Us</h3>
                <p>contactus@urbannestle.com</p>
              </div>
            </div>
            
            <div class="contact-item" id="last">
              <i class="fa-solid fa-pen fa-3x" style="color: #511f1f;"></i>
              <div class="contact-info">
                <h3>Fill the Form</h3>
                <!--Make a contact form, see from chatgpt, move the faq form to help-->
                <p>We'll get back to you soon</p>
              </div>
            </div>
          </div>
          <!--FAQ-->
            <form method="post" action="reviewinsert.php">
              <div class="faq">
                <h2 style="text-align: center;">CONTACT US <hr></h2>
                <label for="name">Name</label><input type="text" id="name" name="name" placeholder="Enter Your Name" class="form-text" required><br>
                <label for="email">Email</label><input type="email" id="email" name="email" placeholder="Example : 123@gmail.com"  class="form-text"  required><br>
                <label for="phone_no">Phone Number</label><input type="text" id="phone_no" name="phone_no" class="form-text" placeholder="Example : +94-1101111"><br>
                <label for="msg">Message</label><textarea name="msg" id="msg" name="msg" cols="30" rows="10"  class="form-text" required></textarea><br>
                <p id="error"></p>
                <input type="submit" onclick="showalert()" class="btn1 btn-primary">
                        </form></div><br><br><br><br><br>
                <script>
                  function showalert(){
                    alert("Your review has been submitted successfully");
                  }
                </script>
<?php include "footer.php"; ?>
               