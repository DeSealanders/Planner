<?php

/**
 * Created by PhpStorm.
 * User: Jordi
 * Date: 1-8-14
 * Time: 2:34
 */
class AddEventView
{
    public function getHtml()
    {
        ob_start();

        echo $this->createView();

        return ob_get_clean();
    }

    public function timeBox($timeID)
    {
        ob_start();
        ?>
        <div id="<?php echo $timeID; ?>" class="input-append">
            <input data-format="hh:mm" type="text" placeholder="Kies een tijd" readonly></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i>
            </span>
        </div>

        <script type="text/javascript">
            $(function () {
                $('#<?php echo $timeID;?>').datetimepicker({
                    pickDate: false,
                    pickTime: true,
                    pickSeconds: false,
                    language: 'nl',
                });
            });
        </script>

    <?php
        return ob_get_clean();
    } // Close timeBox
    public function dateBox($dateID)
    {
        ob_start();
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
        return ob_get_clean();
    } // Close dateBox

    public function createView()
    {
        ob_start();
        echo 'Startdatum <br />';
        echo $this->timeBox("startTime");
        echo $this->dateBox("startDate");

        echo 'Einddatum <br />';
        echo $this->timeBox("endTime");
        echo $this->dateBox("endDate");
        return ob_get_clean();
    }
}

?>