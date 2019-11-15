<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
 
<h4>User Login Form</h4>


<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>

<?php $attributes = array("name" => "loginform");
echo form_open("user/login", $attributes);?>
<div class="form-group">
    <table class="table">
        <tr>    
            <td><label for="email">Email</label></td><td><input class="form-control" name="email" placeholder="Email-ID" type="text" /> 
                <span class="text-danger"><?php echo form_error('email'); ?></span></td>
        </tr>    
        <tr>    
            <td><label for="subject">Password</label></td><td><input class="form-control" name="password" placeholder="Password" type="password" /> 
                <span class="text-danger"><?php echo form_error('password'); ?></span></td>
        </tr>        
        <tr>    
            <td></td>
            <td><button name="submit" type="submit" class="btn btn-info">Login</button></td>        
        </tr>
    </table>
</div>    
<?php echo form_close(); ?>