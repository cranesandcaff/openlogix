angular.module('openlogix').controller('mapCtrl', function($scope, $http){
  $scope.addresses = [];
  function loadParkingSpots(){
    return $http.get('/addresses').then(function(res){
      console.log(res);
      $scope.addresses = res.data;
      console.log($scope.addresses);
    });
  }
  loadParkingSpots();

  $scope.parking = {address:'', spots: 0, reserved: 0};
  $scope.getLocation = function(val){
    return $http.get('http://maps.googleapis.com/maps/api/geocode/json', {
      params: {
        address: val,
        sensor: false
      }
    }).then(function(res){
      var addresses = [];
      angular.forEach(res.data.results, function(item){
        addresses.push(item.formatted_address);
      });
      return addresses;
    });
  };

  $scope.saveParkingLot = function(address){
    $http.post('/addresses', address).then(function(res){
      console.log(res);
      if(res.status === 200){
        $scope.addresses.push(res.data);
      }
    });
  };

  $scope.reserveSpot = function(address){
    var newReserved = address.reserved + 1;
    if(address.spots >= newReserved){
      address.reserved++;
      $http.put('/addresses/' + address.id, address).then(function(res){
        console.log(res);
      });
    }

  };
});
