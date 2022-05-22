<?php
//https://leetcode.com/problems/unique-paths-ii/
//runtime is too high

class Solution {

    private $outerWidth;
    private $innerWidth;

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */

    function findPaths($obstacleGrid, $row, $column){

        if($row>$this->outerWidth||$column>$this->innerWidth){

            return 0;
        }
        $counter=0;

        if($obstacleGrid[$row][$column]==1) {
            return 0;
        }elseif($obstacleGrid[$row][$column]==0){
            $counter+= $this->findPaths($obstacleGrid, $row + 1, $column);
            $counter+= $this->findPaths($obstacleGrid, $row, $column+1);
        }else{
            return 1;
        }

        return $counter;
    }

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */

    function uniquePathsWithObstacles($obstacleGrid) {
        $this->outerWidth=count($obstacleGrid)-1;
        $this->innerWidth=count($obstacleGrid[0])-1;

        if($obstacleGrid[$this->outerWidth][$this->innerWidth]==1){
            return 0;
        }
        else{
            $obstacleGrid[$this->outerWidth][$this->innerWidth]=-1;
            return $this->findPaths($obstacleGrid, 0,0);
        }


    }
}

    $solution1=new Solution();
    $kek=$solution1->uniquePathsWithObstacles(array(array(0,0,0),(array(0,1,0)),array(0,0,0)));
    printf($kek);
    /*
    $kek=$solution1->uniquePathsWithObstacles(array(array(0,0)));
    printf($kek);
    */
