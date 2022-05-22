<?php
 // Definition for a binary tree node.
 class TreeNode {
      public $val = null;
      public $left = null;
      public $right = null;
      function __construct($val = 0, $left = null, $right = null) {
          $this->val = $val;
          $this->left = $left;
          $this->right = $right;
    }
 }

class Solution {
    private $highestValue;

    function setHighestValue($root){
        if($root->left==null){
            //left successor is null
            if($root->right==null){
                //left&right successors are null
                if($this->highestValue<$root->val)
                    $this->highestValue=$root->val;
                return $root->val;
            }else{
                //only the left successor is null, the right isn't
                $tmp=$this->setHighestValue($root->right);
                $newHighestValue=max(array($root->val,$tmp+$root->val));
                if($newHighestValue>$this->highestValue){
                    $this->highestValue=$newHighestValue;
                }
                return $newHighestValue;
            }
        }elseif($root->right==null){
            //right successor is null, the left isn't
            $tmp=$this->setHighestValue($root->left);
            $newHighestValue=max(array($root->val,$tmp+$root->val));
            if($newHighestValue>$this->highestValue){
                $this->highestValue=$newHighestValue;
            }
            return $newHighestValue;
        }else{
            //left&right successors aren't null
            $tmpLeft=$this->setHighestValue($root->left);
            $tmpRight=$this->setHighestValue($root->right);
            $value1=$root->val+$tmpLeft;
            $value2=$root->val+$tmpRight;
            $value3=$value1+$tmpRight;
            $newHighestValue=max([$root->val,$value1, $value2]);
            if($newHighestValue>$this->highestValue){
                $this->highestValue=$newHighestValue;
            }
            //now we need to check if this node edge is the highest
            if($value3>$this->highestValue){
                $this->highestValue=$value3;
            }
            return $newHighestValue;
        }
    }
    function maxPathSum($root) {
        $this->highestValue=-1000;
        $this->setHighestValue($root);
        return $this->highestValue;
    }
}

$tree=new TreeNode(1,new TreeNode(-2),new TreeNode(3));
 $solution=new Solution();
 echo $solution->maxPathSum($tree);