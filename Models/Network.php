<?php 
   class Network {
      public $data;
      public $ultimate_paths;

      function __construct($_data){
         $this->data = $_data;
      }

      public function getData(){
         return $this->data;
      }

      public function setData($_data){
         $this->data = $_data;
      }

      public function findPath(){
         $graph = [];

         //Create an array with all the nodes for all the "from" paths
         foreach ($this->data as $d) {
            $graph[$d['from']][] = ['to' => $d['to'], 'status' => $d['status']];
         }

         $this->ultimate_paths = [];
         $visited_paths = array();

         //Call the searchPath function
         $this->searchPath(0, [], $graph, $visited_paths);

         return $this->ultimate_paths;
      }

     

      private function searchPath($node, $path, $graph, &$visited_paths) {

         if(array_key_exists($node, $visited_paths)){
            $visited_paths[$node] = true;
         } else {
            array_push($visited_paths, $node);
            $visited_paths[$node] = true;
         }

         

         //Add the current node to the path
         $path[] = $node;
         
         //Check if the node exists in the graph
         if (isset($graph[$node])) {
            
            foreach ($graph[$node] as $g) {
               //The "to" is the current graph neighbor
               $neighbor = $g['to'];

               if(array_key_exists($neighbor, $visited_paths)){
                  $visited_paths[$neighbor] = false;
               } else {
                  array_push($visited_paths, $neighbor);
                  $visited_paths[$neighbor] = false;
               }

               //Check if the neighbor was not visited yet
               if (!$visited_paths[$neighbor]) {
                  //If the current graph status is true, add the path to the ultimate ultimate_paths, reverse and merge the array
                  if ($g['status']) {
                     $this->ultimate_paths[] = array_reverse(array_merge($path, [$neighbor]));
                  }

                  //call the searchPath as a recursive function
                  $this->searchPath($neighbor, $path, $graph, $visited_paths);
               }
            }
         }

      }
   
   }
?>


