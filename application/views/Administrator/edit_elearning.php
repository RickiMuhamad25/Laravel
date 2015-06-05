<?php 
$q = $this->db->get('register');
        foreach ($q->result_array() as $rowDataCnt) {
      ?>
<form method="post" action="<?php echo site_url('login/actEditElearning');?>">
<div class="modal fade" id="<?php echo $rowDataCnt['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">Data <?php echo $rowDataCnt['fn'] ?> <?php echo $rowDataCnt['ln'] ?></h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label>First Name :</label>
            <input type="hidden" name="id" value="<?php echo $rowDataCnt['id'] ?>">
            <input name="fn" class="form-control" type="text" value="<?php echo $rowDataCnt['fn'] ?>">
        </div>

        <div class="form-group">
            <label>Midle Name :</label><input name="mn" class="form-control" type="text" value="<?php echo $rowDataCnt['mn'] ?>">
        </div>

        <div class="form-group">
            <label>Last Name :</label><input name="ln" class="form-control" type="text" value="<?php echo $rowDataCnt['ln'] ?>">
        </div>

        <div class="form-group">
            <label>Email :</label><input name="email" class="form-control" type="text" value="<?php echo $rowDataCnt['email'] ?>">
        </div>

        <div class="form-group">
            <label>Telephone :</label><input name="tlp" class="form-control" type="text" value="<?php echo $rowDataCnt['tlp'] ?>">
        </div>

        <div class="form-group">
            <label>Job Title :</label><input name="job_title" class="form-control" type="text" value="<?php echo $rowDataCnt['job_title'] ?>">
        </div>

        <div class="form-group">
          <label>Job Divisi :</label>
          <select class="btn btn-primary" name="divisi" style="border:none;width:350px;text-align:center;" value="<?php echo $row['divisi'] ?>">
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
          <label>Job Area :</label>
          <select class="btn btn-primary" name="job_area" style="border:none;width:350px;text-align:center;"value="<?php echo $row['job_area'] ?>">
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
            <label>Manager Name :</label><input name="mgr_name" class="form-control" type="text" value="<?php echo $rowDataCnt['mgr_name'] ?>">
        </div>

        <div class="form-group">
            <label>Manager Email :</label><input name="mgr_email" class="form-control" type="text" value="<?php echo $rowDataCnt['mgr_email'] ?>">
        </div>

        <div>
          <button onclick="return confirm('Anda Yakin ingin Mengupdate Elearning ?')" type="submit" class="btn btn-primary" >Update</button>
        </div>

      </div>
    </div>
  </div>
</div>
</form>
<?php } ?>