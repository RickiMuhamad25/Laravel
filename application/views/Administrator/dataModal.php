<?php 
$q = $this->db->get('tran_helpdesk');
				foreach ($q->result_array() as $rowDataCnt) {
			?>
<div class="modal fade" id="<?php echo $rowDataCnt['ticket_help']; ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" align="center">Data <?php echo $rowDataCnt['id_help'] ?></h4>
			</div>
			<div class="modal-body">

				<div class="form-group">
            <font face="Verdana" size="1" color="#000">No :</font>
         			<?php echo $rowDataCnt['id_help'] ?>
       	</div>

      	<div class="form-group">
            <font face="Verdana" size="1" color="#000">Ticket :</font>
             	<?php echo $rowDataCnt['ticket_help'] ?>
        </div>

        <div class="form-group">
            <font face="Verdana" size="1" color="#000">Employee Name :</font>
              <?php echo $rowDataCnt['emp_name'] ?>
         </div>

         <div class="form-group">    
            <font face="Verdana" size="1" color="#000">Division :</font>
              <?php echo $rowDataCnt['emp_div'] ?>
         </div>

         <div class="form-group">     
            <font face="Verdana" size="1" color="#000">Problem :</font>
              <?php 
          if($rowDataCnt['type_help'] == 1) {
              echo "Dekstop";
        }elseif ($rowDataCnt['type_help'] == 2){
          echo "Network";
        }elseif ($rowDataCnt['type_help'] == 3) {
          echo "Email";
        }elseif ($rowDataCnt['type_help'] == 4) {
          echo "Aplication";
        }
        ?> => (<?php echo $rowDataCnt['note_help'] ?>)
         </div>

         <div class="form-group">
            <font face="Verdana" size="1" color="#000">Tim Request :</font>
              <?php echo $rowDataCnt['req_date'] ?>
         </div>

            <font face="Verdana" size="1" color="#000">Status :</font>
               <a href="<?php echo site_url('login/done/'.$rowDataCnt['id_help']); ?>"><button type="submit" class="btn btn-primary">Done</button></a>
               <a href="<?php echo site_url('login/waiting/'.$rowDataCnt['id_help']); ?>"><button class="btn btn-danger" type="submit">Waiting</button></a>
			</div>
		</div>
	</div>
</div>
<?php } ?>
