var app = angular.module("myApp",['ngRoute']);

app.config(function($routeProvider){
    $routeProvider.when("/",{
        templateUrl:"templates/home.html",
        controller:"HomeController"
    })
    .when("/setting",{
        templateUrl:"templates/setting.html",
        controller:"SettingController"
    })
    .otherwise({
        redirecTo:"/"
    });
});

app.controller("HomeController",function($scope){
    $scope.selectedMail;
    $scope.showingReply = false;
    
    $scope.setSelectedMail = function(mail){
       $scope.selectedMail = mail; 
    };
    
    $scope.isSelected = function(mail){
        if($scope.selectedMail){
            return $scope.selectedMail===mail;
        }
    };
});

app.controller("MailListingController",['$scope','$http',function($scope,$http){
    $scope.email = [];
    $http({
        method:"GET",
        url:"service/index.php/mail/lists"
    })
    .success(function(data,status,headers){
        $scope.email = data.result;
    })
    .error(function(data,status,headers){
    });
}]);



app.controller("ContentController",['$scope',function($scope){
    $scope.showingReply = false;
    $scope.reply = {};
    $scope.showReply = function(){
        $scope.showingReply  = true;
    };
    
}]);



app.controller("SettingController",function($scope){
    $scope.setting = {
        name:"Bundit",
        email:"kalamell@hotmail.com",
        age:30
    }
    $scope.updateSetting = function(){
        console.log("update");
    };
});