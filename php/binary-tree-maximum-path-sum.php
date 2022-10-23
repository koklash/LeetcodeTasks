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
        if($root==null) {
            return 0;
        }else{
            //left&right successors aren't null
            $tmpLeft=$this->setHighestValue($root->left);
            $tmpRight=$this->setHighestValue($root->right);
            $newHighestValue=max([$root->val,$root->val+$tmpLeft,$root->val+$tmpRight]);
            $this->highestValue=max([$newHighestValue,$this->highestValue,$root->val+$tmpLeft+$tmpRight]);
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