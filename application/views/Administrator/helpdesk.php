<?php 
  foreach ($sequences->result_array() as $row ) :
 ?>
<?php 
  foreach ($divisi->result_array() as $rowdiv ) :
 ?>
<form method="post" action="<?php echo site_url('login/helpdesk'); ?>">
<div class="modal fade" id="addhelpdesk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">PTCS Helpdesk Registration</h4>
      </div>
      <div class="modal-body">
        <?php 
          $div = $rowdiv['dept'];
          $year = "%Y";
          $month = "%m";
            
          $time = time(); // Get the current timestamps
          $year = mdate($year, $time);
          $month = mdate($month, $time);
          $seqID = $row['seq_id'];
          $seqFormat =  substr("00000", strlen($seqID));
          $opr = "H";

          $format = "0000" . substr($year, 2) . $opr . $seqFormat;

          $sequence = strtoupper($format . $seqID);
          
        ?>

        <div class="form-group">
          <label>Ticket : </label>
          <input type="hidden" name="seqid" value="<?php echo $row['seq_id'] ?>">
          <input type="text" class="form-control" name="ticket_help"  value="<?php echo $sequence; ?>">
        </div>

        <div class="form-group">
          <label>Employee ID : </label><input type="text" class="form-control" name="emp_id"  value="<?php echo $emp_id ?>">
        </div>

        <div class="form-group">
          <label>Name : </label><input type="text" class="form-control" name="emp_name"  value="<?php echo $username ?>">
        </div>

        <div class="form-group">
          <label>Division : </label><input type="text" class="form-control" name="emp_div"  value="<?php echo $div ?>">
        </div>

        <div class="form-group">
          <label>Email : </label><input type="email" class="form-control" name="emp_email"  placeholder="Masukan Email Anda">
        </div>

        <div class="form-group">
          <label>Problem : </label>
          <select class="btn btn-primary" name="type_help" style="border:none;width:350px;text-align:center;">
            <option style="border:none;">-----</option>
            <option style="border:0;" value="1">Dekstop</option>  
            <option style="border:none;" value="2">Network</option>  
            <option style="border:none;" value="3">Email</option>
            <option style="border:none;" value="4">Aplication</option>
           </select>
        </div>

        <div class="form-group">
          <label>Note : </label><textarea type="text" style="display: none; width: 590px; height: 100px;" rows="10"  class="form-control" name="note_help"></textarea>
        </div>

        <div>
          <button onclick="return confirm('Anda Yakin ingin Membuat Helpdesk ?')" type="submit" class="btn btn-primary" >Procces</button>
        </div>

      </div>
    </div>
  </div>
</div>
</form>
<?php endforeach ?>
<?php endforeach ?>

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

    