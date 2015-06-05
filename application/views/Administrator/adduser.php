<?php 
  foreach ($seq->result_array() as $row ) :
 ?>

<form method="post" action="<?php echo site_url('login/user');?>">
<div class="modal fade" id="adduser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">PTCS Users Registration</h4>
      </div>
      <div class="modal-body">
      	<?php 
          $year = "%Y";
          $month = "%m";
            
          $time = time(); // Get the current timestamps
          $year = mdate($year, $time);
          $month = mdate($month, $time);
          $seqID = $row['seq_id'];
          $seqFormat =  substr("00000", strlen($seqID));
          $opr = "U";

          $format = "0000" . substr($year, 2) . $opr . $seqFormat;

          $sequence = strtoupper($format . $seqID);
          
        ?>
        <div class="form-group">
          <label>User_id : </label>
          <input type="hidden" name="seqid" value="<?php echo $row['seq_id'] ?>">
          <input type="text" class="form-control" name="user_id"  value="<?php echo $sequence; ?>">
        </div>

        <div class="form-group">
          <label>Username : </label><input type="text" class="form-control" name="username"  placeholder="Username Anda">
        </div>

        <div class="form-group">
          <label>Password : </label><input type="password" class="form-control" name="password"  placeholder="Password Anda">
        </div>

        <div class="form-group">
          <label>Emp Id : </label><input type="text" class="form-control" name="emp_id"  placeholder="emp_id anda">
        </div>

        <div class="form-group">
          <label>User Level : </label>
          <select class="btn btn-primary" name="user_level" style="border:none;width:350px;text-align:center;">
            <option style="border:none;">--</option>
            <option style="border:0;" value="0">admin</option>
            <option style="border:none;" value="1">manager</option>
            <option style="border:none;" value="2">author</option>
            <option style="border:none;" value="3">viewer</option>
          </select>
        </div>
    
        <div>
          <button onclick="return confirm('Anda Yakin ingin Membuat Users ?')" type="submit" class="btn btn-primary" >Procces</button>
        </div>

</table>
</div>
</div>
</div>
</div>
</form>
<?php endforeach ?>