<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Businessdays Class
 *
 * Calculates holidays for current, past and next year, then finds the business days between two days (skipping the holidays)
 * 
 * 
 * 
 */

class BusinessDays
{

    function getHolidayDays($startDate,$endDate){

        $holidays = $this->getHolidays();
        // var_dump($holidays);
        // echo "<br/><br/>";

        // Returns the number of business days between two dates and it skips the holidays
        // source: http://stackoverflow.com/questions/336127/calculate-business-days

        // do strtotime calculations just once
        $endDate = strtotime($endDate);
        $startDate = strtotime($startDate);


        //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
        //We add one to inlude both dates in the interval.
        $days = ($endDate - $startDate) / 86400 + 1;

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        //It will return 1 if it's Monday,.. ,7 for Sunday
        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);

      /*  var_dump($the_first_day_of_week);
        echo "<br/>";
        var_dump($the_last_day_of_week);
        echo "<br/>";*/

        //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
        //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
        }
        else {
            // (edit by Tokes to fix an edge case where the start day was a Sunday
            // and the end day was NOT a Saturday)

            // the day of the week for start is later than the day of the week for end
            if ($the_first_day_of_week == 7) {
                // if the start date is a Sunday, then we definitely subtract 1 day
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    // if the end date is a Saturday, then we subtract another day
                    $no_remaining_days--;
                }
            }
            else {
                // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
                // so we skip an entire weekend and subtract 2 days
                $no_remaining_days -= 2;
            }
        }

        //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
    //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
       $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0 )
        {
          $workingDays += $no_remaining_days;
        }
        /*var_dump($workingDays);
        echo "<br/>";*/

        //We subtract the holidays
        foreach($holidays as $holiday){
            $time_stamp=strtotime($holiday);
            //If the holiday doesn't fall in weekend
            if ($startDate == $time_stamp && date("N",$startDate) != 6 && date("N",$startDate) != 7) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +1 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);

                $day_off = $day_after_holiday;
                echo "Day off 1: ".$day_off;
                echo "<br/>";
                
            } else if ($startDate == $time_stamp && date("N",$startDate) == 6) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +2 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);
                $day_off = $day_after_holiday;
                
                echo "Day off 2: ".$day_off;
                echo "<br/>";
            } else if ($startDate == $time_stamp && date("N",$startDate) == 7) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +1 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);
                $day_off = $day_after_holiday;
                
                echo "Day off 3: ".$day_off;
                echo "<br/>";
            }
        }

        // return $workingDays;
    }

    // Return the day that will work
    function getWorkingDays($startDate,$endDate){

        $holidays = $this->getHolidays();

        // Returns the number of business days between two dates and it skips the holidays
        // source: http://stackoverflow.com/questions/336127/calculate-business-days

        // do strtotime calculations just once
        $endDate = strtotime($endDate);
        $startDate = strtotime($startDate);


        //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
        //We add one to inlude both dates in the interval.
        $days = ($endDate - $startDate) / 86400 + 1;

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        //It will return 1 if it's Monday,.. ,7 for Sunday
        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);

        //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
        //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
        }
        else {
            // (edit by Tokes to fix an edge case where the start day was a Sunday
            // and the end day was NOT a Saturday)

            // the day of the week for start is later than the day of the week for end
            if ($the_first_day_of_week == 7) {
                // if the start date is a Sunday, then we definitely subtract 1 day
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    // if the end date is a Saturday, then we subtract another day
                    $no_remaining_days--;
                }
            }
            else {
                // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
                // so we skip an entire weekend and subtract 2 days
                $no_remaining_days -= 2;
            }
        }

        //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
    //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
       $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0 )
        {
          $workingDays += $no_remaining_days;
        }

        //We subtract the holidays
        foreach($holidays as $holiday){
            $time_stamp=strtotime($holiday);
            //If the holiday doesn't fall in weekend
            if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
                $workingDays--;
        }

        return $workingDays;
    }

    //Example:

    //$holidays=array("2008-12-25","2008-12-26","2009-01-01");

    // echo getWorkingDays("2008-12-22","2009-01-02",$holidays)
    // => will return 7


    function getHolidays() {
        // Get current year, and year before and after
        $year = date("Y");
        // $years = array($year, $year+1, $year-1);
        $years = array($year);

        // Get New Years, Independence Day, Human's Right, Meak Bochea Day, Women's Right Day, Khmer New Year, Labor Day, King Sihamoni's Birthday, Visak Bochea Day, Constitution Day, Pchum Ben Day, Paris Peach Agreement Day, Coronation Day, Fomer King Sihanouk's Day, Independence Day, Water Fastival, International Human Right Day
        $holidays = array($year."-01-01", $year."-01-07", $year."-03-08", $year."-04-14",$year."-04-15", $year."-04-16", $year."-05-01", $year."-05-13", $year."-05-14", $year."-05-15", $year."-06-18", $year."-09-24", $year."-10-14", $year."-10-23", $year."-10-15", $year."-10-31", $year."-11-09", $year."-11-27", $year."-12-10");

        foreach ($years as $year) { // Get holidays for each year

            // Add more holiday
            array_push($holidays, $year."-10-01"); // 2015-10-01
            
            // Get all the floating holidays
            /*$mondays = $this->count_dows_in_month($year, 5, 1); // check to see how many Mondays are in May
            $memorial_day = "";
            if ($mondays == 4) {  // if only 4 Mondays, then Memorial Day falls on the 4th Monday
                $memorial_day = $this->get_holiday($year, 5, 1, 4);
            }
            else { // else there are 5 Mondays, so Memorial Day falls on the 5th Monday
                $memorial_day = $this->get_holiday($year, 5, 1, 5);
            }
            $labor_day = $this->get_holiday($year, 9, 1, 1); // Labor Day is 1st Monday in September
            $thanksgiving = $this->get_holiday($year, 11, 4, 4); // Thanksgiving is 4th Thursday in November
            $day_after_thanksgiving = strtotime(date("Y-m-d", strtotime($thanksgiving)) . " +1 day");
            $day_after_thanksgiving = date('Y-m-d', $day_after_thanksgiving);
            array_push($holidays, $memorial_day, $labor_day, $thanksgiving, $day_after_thanksgiving);*/
        }

        return $holidays;

    }




    // The following 3 functions calculate floating holidays
    // source: http://abledesign.com/programs/holiday_code.php

    function format_date($year, $month, $day) {
        // pad single digit months/days with a leading zero for consistency (aesthetics)
        // and format the date as desired: YYYY-MM-DD by default

        if (strlen($month) == 1) {
            $month = "0". $month;
        }
        if (strlen($day) == 1) {
            $day = "0". $day;
        }
        $date = $year ."-". $month ."-". $day;
        return $date;
    }

    function get_holiday($year, $month, $day_of_week, $week_of_month) {
        // i.e. find the 3rd Monday in January, 2000

        if (($week_of_month > 5) || ($week_of_month < 1) || ($day_of_week > 6) || ($day_of_week < 0)) {
            // should check any month/week combo first against $lastday...
            return FALSE;
        } else {
            $firstday = date("w", mktime(0, 0, 0, $month, 1, $year));
            $lastday = date("t", mktime(0, 0, 0, $month, 1, $year));

            // start by finding the first occurence in the month of that $day_of_week #
            // then add appropriate number of weeks

            if ($firstday > $day_of_week) {
                // means we need to jump to the second week to find the first $day_of_week
                $diff = ($firstday - $day_of_week);
                $first_dow = (7 - $diff) + 1;
                $day = $first_dow + (($week_of_month * 7) - 7);
            } elseif ($firstday < $day_of_week) {
                // correct week, now move forward to specified day
                $day = ($day_of_week - $firstday + 1) + (($week_of_month * 7) - 7);
            } else {
                // correct day in first week ($firstday = $day_of_week)
                $day = 1 + (($week_of_month * 7) - 7);
            }
            $date = $this->format_date($year, $month, $day);
            return $date;
        }
    }

    function count_dows_in_month($year, $month, $day_of_week) {
        // count how many weeks in the month have a specified day, such as Monday.
        // we know there will be 4 or 5, so no need to check for $weeks<4 or $weeks>5

        $firstday = date("w", mktime(0, 0, 0, $month, 1, $year));
        $lastday = date("t", mktime(0, 0, 0, $month, 1, $year));

        if ($firstday > $day_of_week) {
            // means we need to jump to the second week to find the first $day_of_week
            $d = (7 - ($firstday - $day_of_week)) + 1;
        } elseif ($firstday < $day_of_week) {
            // correct week, now move forward to specified day
            $d = ($day_of_week - $firstday + 1);
        } else {    // $firstday = $day_of_week
            // correct day in first week
            $d = ($firstday - 1);
        }

        $d += 28;    // jump to the 5th week and see if the day exists
        if ($d > $lastday) {
            $weeks = 4;
        } else {
            $weeks = 5;
        }
        return $weeks;
    }

    // Check holiday with gaven date, if holiday, it will be plus one day more
    function checkDayOffAndReturnDate($startDate,$endDate){

        $holidays = $this->getHolidays();
        // $day_off = date("Y-m-d");
        $day_off = FALSE;
        // var_dump($holidays);
        // echo "<br/><br/>";

        // Returns the number of business days between two dates and it skips the holidays
        // source: http://stackoverflow.com/questions/336127/calculate-business-days

        // do strtotime calculations just once
        $endDate = strtotime($endDate);
        $startDate = strtotime($startDate);


        //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
        //We add one to inlude both dates in the interval.
        $days = ($endDate - $startDate) / 86400 + 1;

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        //It will return 1 if it's Monday,.. ,7 for Sunday
        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);

      /*  var_dump($the_first_day_of_week);
        echo "<br/>";
        var_dump($the_last_day_of_week);
        echo "<br/>";*/

        //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
        //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
        }
        else {
            // (edit by Tokes to fix an edge case where the start day was a Sunday
            // and the end day was NOT a Saturday)

            // the day of the week for start is later than the day of the week for end
            if ($the_first_day_of_week == 7) {
                // if the start date is a Sunday, then we definitely subtract 1 day
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    // if the end date is a Saturday, then we subtract another day
                    $no_remaining_days--;
                }
            }
            else {
                // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
                // so we skip an entire weekend and subtract 2 days
                $no_remaining_days -= 2;
            }
        }

        //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
    //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
       $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0 )
        {
          $workingDays += $no_remaining_days;
        }
        /*var_dump($workingDays);
        echo "<br/>";*/

        $day_off = date('Y-m-d', $startDate);
        //We subtract the holidays
        foreach($holidays as $holiday){
            // echo $holiday;
            // echo "<br/>";
            $time_stamp=strtotime($holiday);
            //If the holiday doesn't fall in weekend
            if ($startDate == $time_stamp && date("N",$startDate) != 6 && date("N",$startDate) != 7) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +1 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);
                $day_off = $day_after_holiday;

                // break;
                $startDate = strtotime($day_off);

                /*echo "Day off 1: ".$day_off;
                echo "<br/>";*/
                
            } else if ($startDate == $time_stamp && date("N",$startDate) == 6) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +2 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);
                $day_off = $day_after_holiday;

                // break;
                $startDate = strtotime($day_off);
                
                /*echo "Day off 2: ".$day_off;
                echo "<br/>";*/
            } else if ($startDate == $time_stamp && date("N",$startDate) == 7) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +1 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);
                $day_off = $day_after_holiday;

                // break;
                $startDate = strtotime($day_off);
                
                // echo "Day off 3: ".$day_off;
                // echo "<br/>";
            } else if (date("N",$startDate) == 7) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +1 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);
                $day_off = $day_after_holiday;

                // break;
                $startDate = strtotime($day_off);

            } else if (date("N",$startDate) == 6) {
                $day_after_holiday = strtotime(date("Y-m-d", $startDate) . " +2 day");
                $day_after_holiday = date('Y-m-d', $day_after_holiday);
                $day_off = $day_after_holiday;

                // break;
                $startDate = strtotime($day_off);
            }
        }

// var_dump($day_off); die();
        return $day_off;
    }
}