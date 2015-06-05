<?php 
$q = $this->db->get('tran_metbook');
        foreach ($q->result_array() as $rowDataCnt) :
      ?>
<form method="post" action="<?php echo site_url('login/acteditbook'); ?>">
<div class="modal fade" id="<?php echo $rowDataCnt['id_book']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" align="center">Data</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label>Ticket Book :</label>
            <input type="hidden" name="id_book" value="<?php echo $rowDataCnt['id_book'] ?>">
            <input name="ticket_book" class="form-control" type="text" value="<?php echo $rowDataCnt['ticket_book'] ?>">
        </div>

        <div class="form-group">
            <label>Employee ID :</label><input type="text" class="form-control" name="emp_id" value="<?php echo $rowDataCnt['emp_id'] ?>">
        </div>

        <div class="form-group">
            <label>Room :</label><input type="text" class="form-control" name="id_room"  placeholder="" value="<?php echo $rowDataCnt['id_room'] ?>">
        </div>

        <div class="form-group">
            <label>Date Book :</label><input type="text" class="form-control" name="date_book" id="datetimepickerPickup1" value="<?php echo $rowDataCnt['date_book'] ?>">
        </div>

        <div class="form-group">
            <label>End Book :</label><input type="text" class="form-control" name="end_book" id="datetimepickerDropoff1" value="<?php echo $rowDataCnt['end_book'] ?>">
        </div>

        <div class="form-group">
            <label>Email:</label><input type="text" class="form-control" name="emp_email"  placeholder="" value="<?php echo $rowDataCnt['emp_email'] ?>">
        </div>

        <div>
          <button onclick="return confirm('Anda Yakin ingin Mengupdate Books Meeting ?')" type="submit" class="btn btn-primary" >Update</button>
        </div>

      </div>
    </div>
  </div>
</div>
</form>
<?php endforeach ?>

<script>/*
             window.onerror = function(errorMsg) {
             $('#console').html($('#console').html()+'<br>'+errorMsg)
             }*/
                $('#datetimepicker').datetimepicker({
                    dayOfWeekStart: 1,
                    lang: 'en',
                    disabledDates: ['1986-01-08', '1986-01/09', '1986-01-10'],
                    startDate: '1986/01/05'
                });
                $('#datetimepicker').datetimepicker({value: '2015-04-15 05:03', step: 10});

                $('#default_datetimepicker').datetimepicker({
                    formatTime: 'H:i',
                    formatDate: 'd-m-Y',
                    defaultDate: '8-12-1986', // it's my birthday
                    defaultTime: '10:00',
                    timepickerScrollbar: false
                });

                $('#datetimepicker10').datetimepicker({
                    step: 5,
                    inline: true
                });
                $('#datetimepicker_mask').datetimepicker({
                    mask: '9999-19-39 29:59'
                });

                $('#datetimepicker1').datetimepicker({
                    datepicker: false,
                    format: 'H:i',
                    step: 5
                });
                $('#datetimepicker2').datetimepicker({
                    yearOffset: 222,
                    lang: 'ch',
                    timepicker: false,
                    format: 'd-m-Y',
                    formatDate: 'Y-m-d',
                    minDate: '-1970-01-02', // yesterday is minimum date
                    maxDate: '+1970-01-02' // and tommorow is maximum date calendar
                });
                $('#datetimepicker3').datetimepicker({
                    inline: true
                });
                $('#datetimepicker4').datetimepicker();
                $('#open').click(function () {
                    $('#datetimepicker4').datetimepicker('show');
                });
                $('#close').click(function () {
                    $('#datetimepicker4').datetimepicker('hide');
                });
                $('#reset').click(function () {
                    $('#datetimepicker4').datetimepicker('reset');
                });
                $('#datetimepicker5').datetimepicker({
                    datepicker: false,
                    allowTimes: ['12:00', '13:00', '15:00', '17:00', '17:05', '17:20', '19:00', '20:00'],
                    step: 5
                });
                $('#datetimepicker6').datetimepicker();
                $('#destroy').click(function () {
                    if ($('#datetimepicker6').data('xdsoft_datetimepicker')) {
                        $('#datetimepicker6').datetimepicker('destroy');
                        this.value = 'create';
                    } else {
                        $('#datetimepicker6').datetimepicker();
                        this.value = 'destroy';
                    }
                });
                var logic = function (currentDateTime) {
                    if (currentDateTime.getDay() == 6) {
                        this.setOptions({
                            minTime: '11:00'
                        });
                    } else
                        this.setOptions({
                            minTime: '8:00'
                        });
                };
                $('#datetimepickerPickup1').datetimepicker({
                    onChangeDateTime: logic,
                    onShow: logic
                });
                $('#datetimepickerDropoff1').datetimepicker({
                    onChangeDateTime: logic,
                    onShow: logic
                });
                $('#datetimepicker8').datetimepicker({
                    onGenerate: function (ct) {
                        $(this).find('.xdsoft_date')
                                .toggleClass('xdsoft_disabled');
                    },
                    minDate: '-1970-01-2',
                    maxDate: '+1970-01-2',
                    timepicker: false
                });
                $('#datetimepicker9').datetimepicker({
                    onGenerate: function (ct) {
                        $(this).find('.xdsoft_date.xdsoft_weekend')
                                .addClass('xdsoft_disabled');
                    },
                    weekends: ['01-01-2014', '02-01-2014', '03-01-2014', '04-01-2014', '05-01-2014', '06-01-2014'],
                    timepicker: false
                });
                var dateToDisable = new Date();
                dateToDisable.setDate(dateToDisable.getDate() + 2);
                $('#datetimepicker11').datetimepicker({
                    beforeShowDay: function (date) {
                        if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                            return [false, ""]
                        }

                        return [true, ""];
                    }
                });
                $('#datetimepicker12').datetimepicker({
                    beforeShowDay: function (date) {
                        if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                            return [true, "custom-date-style"];
                        }

                        return [true, ""];
                    }
                });
                $('#datetimepicker_dark').datetimepicker({theme: 'dark'})
</script>