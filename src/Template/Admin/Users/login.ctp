 <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
             <img src="<?= SITE_URL.'/img/medium/'.$siteconfig->header_logo_image ?>">
							<br><br>
							<br><br>
							
              <div>
                <input name="username" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Log In</button>
                <!--<a class="reset_pass" href="#">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <!--<a href="#signup" class="to_register"> Create Account </a>-->
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                 
                  <p>   <?= $siteconfig->copyright ?></p>
                </div>
              </div>
            </form>
          </section>
        </div>