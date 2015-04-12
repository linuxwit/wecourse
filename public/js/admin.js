var treemenu = {
	treeData: [],
	selectedNode: {},
	addMenu: function() {},
	addSubMenu: function() {},
	selectNode: function(node) {
		this.selectedNode = node;
	},
	showSetting: function(index) {
		$('.menu-item-setting>div.popover.active').toggleClass('active')
		$('.menu-item-setting>div.popover').eq(index).toggleClass('active')
	}
};
var app = angular.module('wecourse', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.controller('MpMenuCtrl', ['$scope', '$http', function($scope, $http) {



	$scope.menu = {
		button: [{
			name: '培训课程',
			sub_button: [{
				fun:'keyword',
				type: 'click',
				key: '讲师介绍',
				keyword:'讲师介绍',
				name: '讲师介绍'
			}, {
				fun:'text',
				type: 'click',
				key: '课程介绍',
				name: '课程介绍',
				text:'这里是内容'
			}]
		}, {
			fun:'module',
			name: '我的课程',
			type: 'view',
			module:'{type:view}',
			url: 'http://m.baidu.com',
			link:'http://m.baidu.com'
		}]
	};
	$scope.addMenu = function() {
		if ($scope.menu && $scope.menu.button && $scope.menu.button.length >= 3) {
			alert('微信公众号规定一级菜单不能超过3个');
		} else {
			$scope.menu.button.push({
				name: ''
			});
		}
	};
	$scope.addSubMenu = function(item) {
		console.log(item);
		if( !item.sub_button ){
			item.sub_button=[];
		}

		if (item.sub_button.length >= 5) {
			alert('微信公众号规定二级菜单不能超过5个');
		} else {
			item.sub_button.push({
				name: '',
				type: 'click',
				key: ''
			})
		}
	};
	
	$scope.selectedNode = {
		sub_button: false
	};

	$scope.selectMenuItem = function(item) {
		$scope.selectedNode = item;
		console.log(item);
	};

	$scope.choose = function(fun) {
		$scope.selectedNode.fun = fun;
		if(!$scope.selectedNode.key){
			$scope.selectedNode.key=$scope.selectedNode.name;
		}
		
		console.log(fun);
		switch (fun) {
			case 'keyword':
				$scope.selectedNode.type = 'click';
				delete $scope.selectedNode.url;
				delete $scope.selectedNode.text;
				delete $scope.selectedNode.link;
				delete $scope.selectedNode.module;
				break;
			case "text":
				$scope.selectedNode.type = 'click';
				delete $scope.selectedNode.url;
				delete $scope.selectedNode.keyword;
				delete $scope.selectedNode.link;
				delete $scope.selectedNode.module;
				break;
			case "link":
				$scope.selectedNode.type = 'view';
				delete $scope.selectedNode.keyword;
				delete $scope.selectedNode.link;
				delete $scope.selectedNode.module;
				break;
			case 'module':
				delete $scope.selectedNode.url;
				delete $scope.selectedNode.keyword;
				delete $scope.selectedNode.link;
				delete $scope.selectedNode.text;
			default:
				break;
		}
	};

	$scope.changeModule=function(){
		if($scope.selectedNode.module){
			var module=angular.fromJson($scope.selectedNode.module);
			console.log(module);
			if(module.type=='click'){
				$scope.selectedNode.type=module.type;
				$scope.selectedNode.key=module.key;
			}
			console.log($scope.selectedNode);
		}else{
			$scope.selectedNode.type='';
			$scope.selectedNode.key='';
		}

	}

	$scope.save = function(url) {
		console.log($scope.menu);

		$http.post(url, $.param({button:$scope.menu}), {
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).success(function(data) {
			console.log(data);
		})
	};

	$scope.remove=function(isRoot,i,j){
		console.log(isRoot);
		console.log(i);
		console.log(j);
		if(isRoot){
			$scope.menu.button.splice(i,1);
		}
		else{
			$scope.menu.button[i].sub_button.splice(j,1);
			if($scope.menu.button[i].sub_button.length==0){
				delete $scope.menu.button[i].sub_button;
				$scope.menu.button[i].fun='keyword';
				$scope.menu.button[i].type='click';
			}
		}
		$scope.selectedNode=null;
	}


}]);