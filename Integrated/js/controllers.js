angular.module('app.controllers',[])
	
	.controller('friendsList',['$scope','$http',function($scope,$http){


    
    $http.get('php/getFriends.php')
            .then((success)=>{

            $scope.friends=success.data;

     })
            .then((err)=>{
              
            });

        


  }])
  .controller('friend',['$scope','$routeParams','$http','$sce',function($scope,$routeParams,$http,$sce){
      
      var geo={
        lat:null,
        lng:null
      }

      var getLocation=(location)=>{
                  $http.get('php/location.php',{params:{location:location}})
                .then((success)=>{
                      
                      geo.lat=success.data[0];
                      geo.lng=success.data[1];
                      
                      var url="https://www.google.com/maps/embed/v1/place?key=AIzaSyCKKG_QXBss6cfolo9dNOBKjuDvYGmZ6Yg&q="+geo.lat+","+geo.lng+"&zoom=18";
                      $scope.locationUrl=$sce.trustAsResourceUrl(url);

               })
                .then((err)=>{
                        
               });
            }

    $http.get('php/getFriend.php',{params:{id:$routeParams.id}})
      .then((success)=>{
            
            $scope.friend=success.data[0];
            getLocation($scope.friend.location);

     })
      .then((err)=>{
              
     });

      
    

    
    
  }]);
		