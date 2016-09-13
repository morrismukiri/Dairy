<a href='index.php' class='btn btn-primary'>Back To Employees</a>
<form action='' method='POST'> 
    <div class="control-group"> 
        <label class="control-label" for="e_name">Name:</label >
        <div class="controls">                
            <input class="input-xlarge" type="text" name='e_name' value='<?php echo stripslashes($row['e_name']) ?>' />
        </div> 
    </div>
    <div class="control-group">    
        <label class="control-label" for="e_mail">E-Mail:</label >
        <div class="controls">
            <input class="input-xlarge" type="email" name='e_mail' value='<?php echo stripslashes($row['e_mail']) ?>' /> 
        </div> 
    </div>
    <div class="control-group">    
        <label class="control-label" for="e_pass">Pass:</label >
        <div class="controls">  
            <input class="input-xlarge" type="text" name='e_pass' value='' /> 
        </div> 
    </div>
    <div class="control-group">     
        <label class="control-label" for="e_role">Role:</label > 
        <div class="controls">            
<!--            <input class="input-xlarge" type="text" name='e_role' value='<?php echo stripslashes($row['e_role']) ?>' /> -->
            <select class="input-xlarge" name='e_role'> 
               <option <?php echo  $selected=(stripslashes($row['e_role'])=='Clerk'?"selected='selected'":""); echo $selected ?>>Clerk</option>
               <option <?php echo  $selected=(stripslashes($row['e_role'])=='Supervisor'?"selected='selected'":""); echo $selected ?>>Supervisor</option>
               <option  <?php echo  $selected=(stripslashes($row['e_role'])=='Manager'?"selected='selected'":""); echo $selected ?>>Manager</option>
            </select> 
        </div> 
    </div>
    <div class="control-group">    
        <label class="control-label" for="e_payroll_no">Payroll No:</label >   
        <div class="controls">        
            <input class="input-xlarge" type="text" name='e_payroll_no' value='<?php echo stripslashes($row['e_payroll_no']) ?>' /> 
        </div>
    </div>
    <div class="control-group">    
        <input class="btn btn-large btn-success" type='submit' value='Save' />
        <input type='hidden' value='1' name='submitted' /> 
    </div>
</form>