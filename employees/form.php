
<form action='' method='POST'> 
    <div class="control-group"> 
        <label class="control-label" for="e_name">Name:</label >
        <div class="controls">                
            <input class="input-xlarge" type="text" name='e_name' value='<?= stripslashes($row['e_name']) ?>' />
        </div> 
    </div>
    <div class="control-group">    
        <label class="control-label" for="e_mail">Mail:</label >
        <div class="controls">
            <input class="input-xlarge" type="email" name='e_mail' value='<?= stripslashes($row['e_mail']) ?>' /> 
        </div> 
    </div>
    <div class="control-group">    
        <label class="control-label" for="e_pass">Pass:</label >
        <div class="controls">  
            <input class="input-xlarge" type="text" name='e_pass' value='<?= stripslashes($row['e_pass']) ?>' /> 
        </div> 
    </div>
    <div class="control-group">     
        <label class="control-label" for="e_role">Role:</label > 
        <div class="controls">            
<!--            <input class="input-xlarge" type="text" name='e_role' value='<?= stripslashes($row['e_role']) ?>' /> -->
            <select class="input-xlarge" name='e_role'>
               <option  <?=  $selected=(stripslashes($row['e_role'])=='Admin'?"selected='selected'":""); echo $selected ?>>Admin</option>
                <option <?=  $selected=(stripslashes($row['e_role'])=='Supervisor'?"selected='selected'":""); echo $selected ?>>Supervisor</option>
                <option <?=  $selected=(stripslashes($row['e_role'])=='Clerk'?"selected='selected'":""); echo $selected ?>>Clerk</option>
            </select> 
        </div> 
    </div>
    <div class="control-group">    
        <label class="control-label" for="e_payroll_no">Payroll No:</label >   
        <div class="controls">        
            <input class="input-xlarge" type="text" name='e_payroll_no' value='<?= stripslashes($row['e_payroll_no']) ?>' /> 
        </div>
    </div>
    <div class="control-group">    
        <input class="btn btn-large btn-success" type='submit' value='Save' />
        <input type='hidden' value='1' name='submitted' /> 
    </div>
</form>