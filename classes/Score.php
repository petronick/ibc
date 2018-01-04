<?php
class Score extends ActiveRecord {
	public $id,$naziv,$p_tim_1,$p_tim_2,$p_rez_1,$p_rez_2,$n_tim_1,$n_tim_2;
	public static $table = "scores";
	public static $key = "id";	
}