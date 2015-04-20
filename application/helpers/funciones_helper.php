<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	function token_seguridad(){

		//echo "dentro del token";

		$date = date('Y-m-d H:i:s');
		$token = md5($date.rand());
		$data['token'] = $token;
		//echo $token;

		return $token;
	}

    function click_calendar($next_sess,$prev_sess){

        $timestamp = time();

        if(date('D', $timestamp) === 'Mon'){
            $start_date = (date('N')!=6) ? strtotime('Monday') : $timestamp;
        }else{
            $start_date = (date('N')!=6) ? strtotime('-1 Monday') : $timestamp;
        }

        // echo " ".$start_date;

        if($next_sess != "" && $prev_sess == ""){
            $sess_day = "+". 7*$next_sess." day";
            $final = strtotime ( $sess_day , $start_date );
        }elseif($prev_sess != "" && $next_sess == ""){
            $sess_day = "-". 7*$prev_sess." day";
            $final = strtotime ( $sess_day , $start_date );
        }elseif($prev_sess != "" && $next_sess != ""){
               $rest = $next_sess - $prev_sess;
               $sess_day = "+". 7*$rest." day";
               $final = strtotime ( $sess_day , $start_date );
        }
        else{
            $final =  $start_date;
        }

//          echo "mira".$final;
//          echo "<br/>";
//
//         echo $start_date;
//         exit;

        //Create list of the seven days starting from start date
        for($day=0; $day<7; $day++)
        {
          $date = strtotime("+{$day} days", $final);
          $day_name = date('l', $date);
          $month_name = date('F', $date);
          $number_day = date('j', $date);

          $dias[$day] = array('d' => spanish_week_day($day_name),
                             'n' =>  $number_day,
                             'm' => spanish_month_name($month_name),
                             'date' => $date);
        }


        return $dias;
     }

    function clean($string) {
       $string = str_replace(' ', '_', $string); // Replaces all spaces with underscore.
       $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

       return preg_replace('/-+/', '_', $string); // Replaces multiple hyphens with single one.
    }

    function spanish_week_day ($name){

            //echo $name;

            if($name == "Monday") $name= "Lunes";
            if($name == "Tuesday") $name= "Martes";
            if($name == "Wednesday") $name= "Miércoles";
            if($name == "Thursday") $name= "Jueves";
            if($name == "Friday") $name= "Viernes";
            if($name == "Saturday") $name= "Sábado";
            if($name == "Sunday") $name= "Domingo";

            return $name;


    }

    function spanish_month_name ($name){

            if($name == "January") $name= "Enero";
            if($name == "February") $name= "Febrero";
            if($name == "March") $name= "Marzo";
            if($name == "April") $name= "Abril";

            if($name == "May") $name= "Mayo";
            if($name == "June") $name= "Junio";
            if($name == "July") $name= "Julio";
            if($name == "August") $name= "Agosto";

            if($name == "September") $name= "Septiembre";
            if($name == "October") $name= "Octubre";
            if($name == "November") $name= "Noviembre";
            if($name == "December") $name= "Diciembre";

            return $name;

    }

    function calendar_week(){

        //echo "calendar_week";

        $timestamp = time();

        if(date('D', $timestamp) === 'Mon'){
            $start_date = (date('N')!=6) ? strtotime('Monday') : $timestamp;
        }else{
            $start_date = (date('N')!=6) ? strtotime('-1 Monday') : $timestamp;
        }

        $first_date = date("Y-m-d H:i:s",$start_date);

        //echo "<br>";
        $plus_seven_days = "+ 7 day";
        $final = strtotime ( $plus_seven_days , $start_date );

        $second_date = date("Y-m-d H:i:s",$final);

        $week = array(
            'first_date' => $first_date,
            'second_date' => $second_date
        );

        return $week;
    }
?>