@extends('BaseCalendar')

@section('title', 'Student Calendar')

@section('link')
<?php
    class Month{

        public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        public $month;
        public $year;

        /**
         * Month Constructor
         * @param int $month, the month between 1 and 12
         * @param int $year, the year of start the calendar
         * @throws Exception for $month
         */
        public function __construct(?int $month = null, ?int $year = null)
        {
            if($month === null || $month < 1 || $month > 12){
                $month = intval(date('m'));
            }
            if($year === null){
                $year = intval(date('Y'));
            }

            $this->month = $month;
            $this->year = $year;
        }

        /**
         * Return the first day in a month
         * @return DateTime
         */
        public function getStartingDay(): DateTime
        {
            return new DateTime("{$this->year}-{$this->month}-01");
        }

        /**
         * return the month with string (ex : march 2018)
         * @return string
         */
        public function toString() : string 
        {
            return $this->months[$this->month - 1].' '.$this->year;
        }

        /**
         * this function count the number of weeks in month
         * @return integer
         */
        public function getWeeks(): int 
        {
            $start = $this->getStartingDay();
            $end = (clone $start)->modify('+1 month -1 day');
            if($end->format('W') < '3'){
                $end = (clone $start)->modify('+1 month -4 day');
                $start ->modify('-1 Weeks');
            }
            
            $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;
            if($weeks < 0){
                $weeks = intval($end->format('W'));
            }
            return $weeks;
        }

        /**
         * return true if the date is in a actual month, false else
         * @param DateTime $date is a date for analyse
         * @return boolean
         */
        public function withInMonth (DateTime $date): bool 
        {
            return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
        }
        
        /**
         * return the next month
         * @return Month
         */
        public function nextMonth(): Month
        {
            $month = $this->month + 1;
            $year = $this->year;
            if($month > 12){
                $month = 1;
                $year += 1;
            }
            return new Month($month, $year);
        }

        /**
         * return the previous month
         * @return Month
         */
        public function prevMonth(): Month
        {
            $month = $this->month - 1;
            $year = $this->year;
            if($month < 1){
                $month = 12;
                $year -= 1;
            }
            return new Month($month, $year);
        }




    }
    ?>

    <?php 
        
        $month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null);
        $start_day = $month->getStartingDay();
        $start_day = $start_day->format('N') === '1' ? $start_day : $month->getStartingDay()->modify('last monday');
        $nbWeeks = $month->getWeeks();
        ?>

        <div>
            <h1><?= $month->toString(); ?></h1>
            <div class="calendar__button">
                <button><a href="/calendar/calendarStudent/?month=<?= $month->prevMonth()->month; ?>&year=<?= $month->prevMonth()->year; ?>">&lt;</a></button>
                <button><a href="/calendar/calendarStudent/?month=<?= $month->nextMonth()->month; ?> &year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt;</a></button>
            </div>
        </div>
        

        <table class="calendar__table calendar__table--<?= $nbWeeks ?>weeks">
            <?php for($i = 0 ; $i < $nbWeeks; $i++):?>
                <tr>
                    <?php 
                        foreach($month->days as $k => $day): 
                        $date = (clone $start_day)->modify('+' . ($k + $i * 7) . ' days')
                    ?>
                    <td class="<?=$month->withInMonth($date) ? '' : 'calendar__othermonth';?>">
                        <?php if($i === 0): ?>
                            <div class="calendar__weekday"><?= $day; ?></div>
                        <?php endif; ?>
                        <div class="calendar__day"><?= $date->format('d') ?></div>
                    </td>
                    <?php endforeach; ?>
                </tr>
            <?php endfor; ?>
        </table>
    <?php

?>
    
@endsection