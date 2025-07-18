  <?php include('../view/header.php')?>    
    <div class="limit">
    <div class="login-container">
        <div class="bb-login">
            <form class="bb-form validate-form" action="authenticate.php" method="POST">
                <span class="bb-form-title p-b-48">
                    <img class='logo' src='/exabalance/asset/siof_logo.png'/>
                </span>
                <div class='invalide_credentials'>
                    <p><?= (isset($_GET['error']))? '*'.str_replace( '_',' ', $_GET['error']):''?></p>
                </div>
                <div class="wrap-input100 validate-input has-validation" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="username" id="validationTooltip01" placeholder="username">
                        <span class="bbb-input" data-placeholder=""></span>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                         <i class="mdi mdi-eye show_password"></i>
                    </span> 
                    <input class="input100" type="password" name="password" placeholder='password'>
                    <span class="bbb-input" data-placeholder=""></span> 
                </div>
                <div class="login-container-form-btn">
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div> <button class="bb-form-btn"> Login </button>
                    </div>
                </div>
                <!--div class="text-center p-t-115"> <span class="txt1"> Don&rsquo;t have an account? </span> <a class="txt2" href="#"> Sign Up </a> </div-->
            </form>
        </div>
    </div>
</div>
</body>
</html>