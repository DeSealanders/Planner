<?php

/**
 * Created by PhpStorm.
 * User: Jordi
 * Date: 1-8-14
 * Time: 2:34
 */
class AddEventView
{

    private $event;

    public function __construct($event = false) {
        $this->event = $event;
    }

    public function getHtml()
    {
        ob_start();
        ?>
        <div class="addEventForm">

            <h3>Naam</h3>
            <input type="text" placeholder="Naam" value="<?php echo $this->name; ?>"></input>

            <h3>Kies de datum en tijd waarop het event start</h3>
            <div class="startDateTime">
                <?php echo $this->dateBox("startDate", $this->startDate); ?>
                <?php echo $this->timeBox("startTime", $this->startTime); ?>
            </div>

            <input type="checkbox" id="eventEndDateCheckbox" />
            <label for="eventEndDateCheckbox" id="eventEndDateLabel">
                Eendaags event
            </label>

            <h3 id="eventEndDateText">Kies de datum en tijd waarop het event eindigt</h3>
            <div class="endDateTime">
                <?php echo $this->dateBox("endDate", $this->endDate); ?>
                <?php echo $this->timeBox("endTime", $this->endTime); ?>
            </div>

            <h3>Locatie</h3>
            <input type="text" placeholder="Locatie" value="<?php echo $this->location; ?>"></input>

            <h3>Beschrijving</h3>
            <input type="text" placeholder="Beschrijving" value="<?php echo $this->description; ?>"></input>

            <button type="submit" class="addEventButton">Opslaan</button>

        </div>
        <?php
        return ob_get_clean();
    }

    public function timeBox($timeID, $value = '')
    {
        ob_start();
        ?>
        <div id="<?php echo $timeID; ?>" class="input-append">
            <input data-format="hh:mm" type="text" placeholder="Kies een tijd" id="<?php echo 'input-' . $timeID; ?>"
                   value="<?php echo $value; ?>"></input>
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
    public function dateBox($dateID, $value = '')
    {
        ob_start();
        ?>
        <div id="<?php echo $dateID; ?>" class="input-append">
            <input data-format="dd-MM-yyyy" type="text" placeholder="Kies een datum" id="<?php echo 'input-' . $dateID; ?>"
                   value="<?php echo $value; ?>"></input>
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

    /**
     * Override get function
     * @param $var
     * @return mixed|string
     */
    public function __get($var) {
        if($this->event) {
            return call_user_func(array($this->event, 'get' . $var));
        }
        else {
            return '';
        }
    }
}

?>