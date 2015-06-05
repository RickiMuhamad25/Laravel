<?php 
  foreach ($sequences->result_array() as $row ) :
 ?>
<form method="post" action="<?php echo site_url('login/elearning'); ?>">
<div class="modal fade" id="addelearning">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">PTCS E-learning Registration</h4>
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
      $opr = "E";

      $format = "0000" . substr($year, 2) . $opr . $seqFormat;

      $sequence = strtoupper($format . $seqID);
      
    ?>

        <div class="form-group">
          <label>Id : </label>
          <input type="hidden" name="seqid" value="<?php echo $row['seq_id'] ?>">
          <input type="text" class="form-control" name="id"  value="<?php echo $sequence; ?>">
        </div>

        <div class="form-group">
          <label>Emp Id : </label><input name="id_emp" class="form-control" type="text" placeholder="Your Emp Id">
        </div>

        <div class="form-group">
          <label>First Name : </label><input type="text" class="form-control" name="fn"  placeholder="First Name">
        </div>

        <div class="form-group">
          <label>Middle Name : </label><input type="text" class="form-control" name="mn"  placeholder="Middle Name">
        </div>

        <div class="form-group">
          <label>Last Name : </label><input type="text" class="form-control" name="ln"  placeholder="Last Name">
        </div>

        <div class="form-group">
          <label>Email : </label><input type="text" class="form-control" name="email"  placeholder=" your Email">
        </div>

        <div class="form-group">
          <label>Phone : </label><input type="text" class="form-control" name="tlp"  placeholder="Your Phone">
        </div>

        <div class="form-group">
          <label>Country </label><label class="form-control">Indonesia</label></td>
        </div>

        <div class="form-group">
          <label>Office : </label><label class="form-control">PT Control Systems Arena Para Nusa</label>
        </div>

        <div class="form-group">
          <label>Company Website : </label><label class="form-control">www.ptcs.co.id</label>
        </div>

        <div class="form-group">
          <label>Job Tittle : </label><input type="text" class="form-control" name="job_title"  placeholder="Your Job">
        </div>

        <div class="form-group">
          <label>Divisi : </label>
          <select class="btn btn-primary" name="divisi" style="margin-left:23px;border:none;width:350px;text-align:center;">
            <option style="border:none;">-----</option>
            <option style="border:none;">AFD</option>
            <option style="border:none;">AI</option>
            <option style="border:none;">CSA</option>
            <option style="border:none;">CTD</option>
            <option style="border:none;">FCS</option>
            <option style="border:none;">FMD</option>
            <option style="border:none;">Marcom</option>
            <option style="border:none;">PMA</option>
            <option style="border:none;">PGA</option>
            <option style="border:none;">Procurement</option>
            <option style="border:none;">PWS</option>
            <option style="border:none;">RAS</option>
            <option style="border:none;">SCD</option>
            <option style="border:none;">SIT</option>
            <option style="border:none;">SPCT</option>
            <option style="border:none;">SSCS</option>
          </select>
        </div>

        <div class="form-group">
          <label>Job Area : </label>
          <select class="btn btn-primary" name="job_area" style="border:none;width:350px;text-align:center;">
            <option style="border:none;">-----</option>
            <option style="border:0;">Administration</option>  
            <option style="border:none;">Administration & Management</option>  
            <option style="border:none;">Application & Customer Service</option>
            <option style="border:none;">Education & Training</option>
            <option style="border:none;">Facilities</option>
            <option style="border:none;">Field Service</option>
            <option style="border:none;">Finance</option>
            <option style="border:none;">GM / Executive Management</option>
            <option style="border:none;">Human Resources</option>
            <option style="border:none;">Information Resources</option>
            <option style="border:none;">Information Technology</option>
            <option style="border:none;">Inside Sales</option>
            <option style="border:none;">Legal</option>
            <option style="border:none;">Manufacturing</option>
            <option style="border:none;">Marketing / Business Dev</option>
            <option style="border:none;">Operations</option>
            <option style="border:none;">Other</option>
            <option style="border:none;">Outside Sales</option>
            <option style="border:none;">Planning</option>
            <option style="border:none;">Procurement</option>
            <option style="border:none;">Project Management</option>
            <option style="border:none;">Quality</option>
            <option style="border:none;">R&D / Engineering</option>
            <option style="border:none;">Supply Chain / Logistics</option>
            <option style="border:none;">System / Project Engineering</option>
            <option style="border:none;">Technical Documentaion</option>
            <option style="border:none;">Technical Support</option>
            <option style="border:none;">Traffic (Ship/Receive/Mail)</option>  
          </select>
        </div>

        <div class="form-group">
          <label>Manager Name : </label><input type="text" class="form-control" name="mgr_name"  placeholder="Your Manager name">
        </div>

        <div class="form-group">
          <label>Manager Email : </label><input type="text" class="form-control" name="mgr_email"  placeholder="Your Manager Email">
        </div>

        <div>
          <button onclick="return confirm('Anda Yakin ingin Membuat Elearning ?')" type="submit" class="btn btn-primary" >Procces</button>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>
</form>

<?php endforeach ?>
