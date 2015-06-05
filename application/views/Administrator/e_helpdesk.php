<?php 
  $q = $this->db->get('tran_helpdesk');
        foreach ($q->result_array() as $rowDataCnt) {
 ?>
<form method="post" action="<?php echo site_url('login/actEditHelpdesk');?>">
<div class="modal fade" id="<?php echo $rowDataCnt['id_help']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">Data</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label>Ticket :</label>
            <input type="hidden" name="id_help" value="<?php echo $rowDataCnt['id_help'] ?>"> 
            <input type="text" class="form-control" name="ticket_help"  value="<?php echo $rowDataCnt['ticket_help'] ?>">
        </div>

        <div class="form-group">
            <label>Emp ID :</label><input type="text" class="form-control" name="emp_id"  value="<?php echo $rowDataCnt['emp_id'] ?>">
        </div>

        <div class="form-group">
            <label>Name :</label><input type="text" class="form-control" name="emp_name"  value="<?php echo $rowDataCnt['emp_name'] ?>">
        </div>

        <div class="form-group">
            <label>Division :</label><input type="text" class="form-control" name="emp_div"  value="<?php echo $rowDataCnt['emp_div'] ?>">
        </div>

        <div class="form-group">
            <label>Division :</label><input type="text" class="form-control" name="emp_div"  value="<?php echo $rowDataCnt['emp_div'] ?>">
        </div>

        <div class="form-group">
            <label>Email :</label><input type="text" class="form-control" name="emp_email"  value="<?php echo $rowDataCnt['emp_email'] ?>">
        </div>

        <div class="form-group">
            <label>Note :</label><textarea type="text" style="display: none; width: 590px; height: 100px;" class="form-control" name="note_help"><?php echo $rowDataCnt['note_help'] ?></textarea>
        </div>

        <div>
          <button onclick="return confirm('Anda Yakin ingin Mengupdate Helpdesk ?')" type="submit" class="btn btn-primary" >Update</button>
        </div>

      </div>
    </div>
  </div>
</div>
</form>
<?php } ?>

<script>
    $(function() {
    // Replace all textarea's
    // with SCEditor
    $("textarea").sceditor({
    plugins: "bbcode",
    style: "minified/jquery.sceditor.default.min.css"
    });
    });
    </script>

<script>
    $(function() {
    // Replace all textarea's
    // with SCEditor
    $("textarea").sceditor({
    plugins: "xhtml",
    style: "minified/jquery.sceditor.default.min.css"
    });
    });
</script>