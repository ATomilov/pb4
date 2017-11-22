<div id="login" class="modal fade clean-modal" role="dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4><?php echo _e("Welcome Back!", 'ol_plugin');?></h4>
                <p>Please enter your profiles credentials <br>below in order to login</p>
            </div>
            <div class="modal-body">
                <div class="account-modal-form">
                    <form class="loginForm">
                        <input type="text" name="email" value="E-Mail Address" class="login">
                        <input type="password" name="password" value="Password" class="password">
                        <label>
                            <div class="icheckbox_flat-yellow" style="position: relative;"><input type="checkbox" name="quux[1]" class="icheckbox_flat-yellow" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; cursor: pointer; background-position: initial initial; background-repeat: initial initial;"></ins></div>
                            <?php echo _e("Keep me logged in", 'ol_plugin');?>
                        </label>

                        <input type="submit" value="<?php echo _e("Enter Personal Area", 'ol_plugin');?>" class="color-animation">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>