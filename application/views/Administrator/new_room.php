<form method="post" action="<?php echo site_url('login/actaddroom'); ?>">
<div class="modal fade" id="addroom">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">PTCS Room Registration</h4>
      </div>
      <div class="modal-body">

        <?php 
          $year = "%Y";
          $month = "%m";
            
          $time = time(); // Get the current timestamps
            
          $year = mdate($year, $time);
          $month = mdate($month, $time);
          //$month =  substr("000", strlen($month));
          $str = random_string('alnum',4);

          $room_id = $month . $year . $str;
          $room_id = strtoupper($room_id);
          
         ?>

         <div class="form-group">
          <label>Room ID : </label>
          <input type="text" class="form-control" name="id_room" value="<?php echo $room_id; ?>">
        </div>

        <div class="form-group">
          <label>Room Name : </label><input type="text" class="form-control" name="room_name">
        </div>

        <div class="form-group">
          <label>Room Floor : </label><input type="text" class="form-control" name="room_floor">
        </div>

        <div class="form-group">
          <label>Projector : </label>
          <input type="radio" value="0" name="room_projector">Not Available
          <input type="radio" value="1" name="room_projector">Available
        </div>

        <div class="form-group">
          <label>Room Status : </label>
          <input type="radio" value="1" name="room_status">Available
          <input type="radio" value="0" name="room_status">Maintenance
        </div>

        <div>
          <button onclick="return confirm('Anda Yakin ingin Membuat Room ?')" type="submit" class="btn btn-primary" >Procces</button>
        </div>

      </div>
    </div>
  </div>
</div>
</form>