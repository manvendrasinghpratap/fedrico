<?php
use App\EmployeeRatingMapping;
use App\Course;

    function getRating($emp_id,$skill,$subskill)
    {
          $empRatingData = EmployeeRatingMapping::whereEmployee_id($emp_id)->whereSkill_id($skill)->whereSubskill_id($subskill)->first();
            if(empty($empRatingData['rating']))
                $rating = 0;
            else
              $rating = $empRatingData['rating'];

          return round($rating,2);
    }

    function getTotalRating($emp_id,$skill)
    {
      $empRatingData = EmployeeRatingMapping::whereEmployee_id($emp_id)->whereSkill_id($skill)->get();
      $ratingArray = array();
      foreach($empRatingData as $inner){
        $ratingArray[] = $inner['rating'];
      }
      //echo '<pre>'; print_r($ratingArray); echo '</pre>';
      if(count($ratingArray)==0){
        $count = 1;
      }
      else {
        $count = count($ratingArray);
      }
      $average = array_sum($ratingArray)/$count;
      return round($average,2);
    }

    function getAverageRating($emp_id,$skill){
      $skillIds = array_filter(explode(',',$skill));
      $empRatingData = EmployeeRatingMapping::whereEmployee_id($emp_id)->whereIn('skill_id',$skillIds)->get();
      $ratingArray = array();
      foreach($empRatingData as $inner){
        $ratingArray[] = $inner['rating'];
      }
      if(count($ratingArray)==0){
        $count = 1;
      }
      else {
        $count = count($ratingArray);
      }
      $average = array_sum($ratingArray)/$count;
      return round($average,2);
      $skill; die();
    }
    function getSubSkillRating($emp_id,$subSkill)
    {
      //echo $subSkill; die();
        $empRatingData = EmployeeRatingMapping::whereEmployee_id($emp_id)->whereSubskill_id($subSkill)->get();
        $ratingArray = $empRatingData->toArray();
        if(count($ratingArray)>0){
          $rating = $ratingArray[0]['rating'];
          return $rating;
        }
        $rating=0;
        return round($rating,2);
    }

    function getCourseName($coursearray)
    {
      $courseName = '';
      if(!empty($coursearray)){
        $data = Course::whereIn('id',json_decode($coursearray))->get();
        $courseNameArray  = $data->toArray();
        foreach($courseNameArray as $innerdata){
          $courseName .= $innerdata['name'].', ';
        }
      }
      return  rtrim($courseName,', ');

    }
