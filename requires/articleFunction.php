<?php

function validateForm($title,$content,$publishedDataTime)
{
        if($title==""){
            $errors[]="Title is required";
        }
        
        if($content==""){
            $errors[]="Content is required";
        }

        if($publishedDataTime !="")
        {
            //This funtion is used to create a date time format from the given string ,if it is unable to conevrt it into date , it returns false
            $date_time=date_create_from_format('Y-m-d H:i:s',$publishedDataTime);

            if($date_time===false)
            {
                $errors[]="Invalid data and time";
            }
            else
            {
                $data_errors=date_get_last_errors();

                if($date_errors['warning_count']>0){
                    $errors[]='Invalid date and time';
                }
            }
        }
    return $errors;
}