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
			fun:'link',
			name: '我的课程',
			type: 'view',
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
		if (item.sub_button && item.sub_button.length >= 5) {
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

	$scope.choose = function(type) {
		$scope.selectedNode.fun = type;
		console.log(type);
		switch (type) {
			case 'keyword':
			case "text":
				$scope.selectedNode.type = 'click';
				break;
			case "link":
				$scope.selectedNode.type = 'view';
			default:
				break;
		}
	};
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

}]);