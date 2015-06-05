<?php 
$q = $this->db->get('tbl_users');
        foreach ($q->result_array() as $rowDataCnt) {
      ?>
<form method="post" action="<?php echo site_url('login/actEditUsers'); ?>">
<div class="modal fade" id="<?php echo $rowDataCnt['user_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">Data <?php print $rowDataCnt['username']; ?></h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>User_id:</label><input name="id" class="form-control" type="text" value="<?php print $rowDataCnt['user_id']; ?>">
        </div>

        <div class="form-group">
          <label>Username:</label><input name="name" class="form-control" type="text" value="<?php print $rowDataCnt['username']; ?>">
        </div>

        <div class="form-group">
          <label>Password:</label><input name="pass" class="form-control" type="password" value="<?php print $rowDataCnt['password']; ?>">
        </div>

        <div class="form-group">
          <label>emp_id:</label><input name="emp" class="form-control" type="text" value="<?php print $rowDataCnt['emp_id']; ?>">
        </div>

        <div class="form-group">
          <label>User_level:</label>
          <select class="btn btn-primary" name="user_level" style="border:none;width:350px;text-align:center;" value="<?php echo $rowDataCnt['user_level']; ?>">
            <option style="border:0;" value="0">admin</option>
            <option style="border:none;" value="1">manager</option>
            <option style="border:none;" value="2">author</option>
            <option style="border:none;" value="3">viewer</option>
          </select>
        </div>

        <div>
          <button onclick="return confirm('Anda Yakin ingin Mengupdate users ?')" type="submit" class="btn btn-primary" >Update</button>
        </div>

      </div>
    </div>
  </div>
</div>
</form>

<?php } ?>