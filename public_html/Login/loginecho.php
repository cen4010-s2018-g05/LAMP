<?php
          echo '<form action="profile.php" method="post">    
                  <div class="form-group">
                  <label for="name">Email</label>
                    <input type="text" class="form-control" id="email" name="email"  pattern=".{1,20}" placeholder="Enter Username">
                    </div>

                 <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" pattern=".{1,20}" placeholder="Password">
                 </div>

                 <div class="row justify-content-center">
                  <div class="col-sm-2 mb-2">
                      <button type="submit" class="btn btn-gold" id="submitbtn">Submit</button>                   
                    </div>
                  </div>
              </form>';
?>