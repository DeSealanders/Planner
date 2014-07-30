<?php include_once("header.php");
function timeBox($timeID)
{
    ?>
    <div id="<?php echo $timeID; ?>" class="input-append">
        <input data-format="hh:mm" type="text" placeholder="Kies een tijd" readonly></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
    </div>

    <script type="text/javascript">
        $(function () {
            $('#<?php echo $timeID;?>').datetimepicker({
                pickDate: false,
                pickTime: true,
                pickSeconds: false,
                language: 'nl',
                maskInput: true
            });
        });
    </script>

<?php
} // Close timeBox
function dateBox($dateID)
{
    ?>
    <div id="<?php echo $dateID; ?>" class="input-append">
        <input data-format="dd-MM-yyyy" type="text" placeholder="Kies een datum" readonly></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
    </span>
    </div>

    <script type="text/javascript">
        $(function () {
            var date = new Date();
            date.setDate(date.getDate());
            $('#<?php echo $dateID;?>').datetimepicker({
                startDate: date,
                pickDate: true,
                pickTime: false,
                language: 'nl',
            });
        });


    </script>

<?php
} // Close dateBox
timeBox("startTime");
dateBox("startDate");

?>

<?php include_once("footer.php"); ?>