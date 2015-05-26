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



var app = angular.module('wecourse', ['ngMessages', 'ngRoute', 'toaster'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.service('api', ['$http', '$route', '$routeParams', '$location', function($http, $route, $routeParams, $location) {
	var service = {};
	service.getQueryStringValue = function(keyName) {
		var searchStr = location.search.substr(1);
		if (searchStr.length == 0)
			return null;
		var collection = searchStr.split('&');
		for (var i = 0; i < collection.length; i++) {
			var tmp = collection[i].split('=');
			if (tmp.length < 2)
				continue;
			if (tmp[0].toUpperCase() == keyName.toUpperCase())
				return tmp[1];
		}
		return null;
	};

	service.getIdByName = function(name) {
		var url = $location.absUrl();
		var paths = url.split('/');

		var nameOffset = 0;
		for (var i = 0; i < paths.length; i++) {
			if (paths[i] == name) {
				nameOffset = i;
			}
		}
		return paths[nameOffset + 1];
	}

	service.getAccount = function(callback, error) {
		id = service.getIdByName('account');
		$http.get('/admin/account/' + id).success(callback).error(error);
	};

	return service;

}])

app.controller('MpMenuCtrl', ['$scope', '$http', 'api', 'toaster', function($scope, $http, api, toaster) {

	var init = function() {
		api.getAccount(function(data, status, headers, config) {
			$scope.menu = angular.fromJson(data.menu);
		}, function(data, status, headers, config) {
			toaster.pop('error', '提示', '获取公众号信息出错');
		});
	};


	$scope.addMenu = function() {
		if ($scope.menu && $scope.menu.button && $scope.menu.button.length >= 3) {
			alert('微信公众号规定一级菜单不能超过3个');
		} else {
			if (!$scope.menu) {
				$scope.menu = {
					button: []
				};
			}
			$scope.menu.button.push({
				name: ''
			});
		}
	};
	$scope.addSubMenu = function(item) {
		console.log(item);
		if (!item.sub_button) {
			item.sub_button = [];
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
		console.log($scope.selectedNode);
	};

	$scope.choose = function(fun) {
		$scope.selectedNode.fun = fun;
		if (!$scope.selectedNode.key) {
			$scope.selectedNode.key = $scope.selectedNode.name;
		}
		console.log(fun);
		switch (fun) {
			case 'keyword':
				$scope.selectedNode.type = 'click';
				delete $scope.selectedNode.url;
				delete $scope.selectedNode.text;
				delete $scope.selectedNode.module;
				break;
			case "text":
				$scope.selectedNode.type = 'click';
				$scope.selectedNode.key = $scope.selectedNode.name;

				delete $scope.selectedNode.url;
				delete $scope.selectedNode.keyword;
				delete $scope.selectedNode.module;

				break;
			case "link":
				$scope.selectedNode.type = 'view';
				$scope.selectedNode.key = $scope.selectedNode.name;
				delete $scope.selectedNode.keyword;
				delete $scope.selectedNode.text;
				delete $scope.selectedNode.module;
				break;
			case 'module':
				delete $scope.selectedNode.url;
				delete $scope.selectedNode.keyword;
				delete $scope.selectedNode.text;
			default:
				break;
		}

	};

	$scope.changeModule = function() {
		if ($scope.selectedNode.module) {
			var module = angular.fromJson($scope.selectedNode.module);
			$scope.selectedNode.type = module.type;
			if (module.type == 'click') {
				$scope.selectedNode.key = module.key;
			}else if(module.type == 'view'){
				$scope.selectedNode.url = module.url;
			}
		} else {
			$scope.selectedNode.type = '';
			$scope.selectedNode.key = '';
		}

	}

	$scope.save = function(url) {
		console.log($scope.menu);
		$http.post(url, $.param({
			button: $scope.menu
		}), {
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).success(function(data) {
			toaster.pop(data.status, '提示', data.msg);
		})
	};

	$scope.remove = function(isRoot, i, j) {
		if (isRoot) {
			$scope.menu.button.splice(i, 1);
		} else {
			$scope.menu.button[i].sub_button.splice(j, 1);
			if ($scope.menu.button[i].sub_button.length == 0) {
				delete $scope.menu.button[i].sub_button;
				$scope.menu.button[i].fun = 'keyword';
				$scope.menu.button[i].type = 'click';
			}
		}
		$scope.selectedNode = null;
	}


	$scope.up = function(isRoot, i, j) {
		if (isRoot) {
			if (i > 0) {
				var clickItem = $scope.menu.button[i];
				$scope.menu.button[i] = $scope.menu.button[i - 1];
				$scope.menu.button[i - 1] = clickItem;
			}
		} else {
			if (j > 0) {
				var clickItem = $scope.menu.button[i].sub_button[j];
				$scope.menu.button[i].sub_button[j] = $scope.menu.button[i].sub_button[j - 1];
				$scope.menu.button[i].sub_button[j - 1] = clickItem;
			}
		}
	}

	$scope.down = function(isRoot, i, j) {
		console.log(isRoot, i, j);
		if (isRoot) {
			if (i < $scope.menu.button.length - 1) {
				var clickItem = $scope.menu.button[i];
				$scope.menu.button[i] = $scope.menu.button[i + 1];
				$scope.menu.button[i + 1] = clickItem;
			}
		} else {
			if (j < $scope.menu.button[i].sub_button.length - 1) {
				var clickItem = $scope.menu.button[i].sub_button[j];
				$scope.menu.button[i].sub_button[j] = $scope.menu.button[i].sub_button[j + 1];
				$scope.menu.button[i].sub_button[j + 1] = clickItem;
			}
		}
	}

	$scope.toggle = function(isRoot, i, j) {
		console.log(isRoot, i, j);
		if (isRoot) {
			$scope.menu.button[i].hide = !($scope.menu.button[i].hide ? $scope.menu.button[i].hide : false);
		} else {
			$scope.menu.button[i].sub_button[j].hide = !($scope.menu.button[i].sub_button[j].hide ? $scope.menu.button[i].sub_button[j].hide : false);
		}
	}

	init();
}]).controller('MpWelcomeCtrl', ['$scope', '$http', 'toaster', 'api', function($scope, $http, toaster, api) {

	var init = function() {
		api.getAccount(function(data, status, headers, config) {
			$scope.welcome = {
				enable: data.subscribeenable,
				type: data.subscribemsgtype,
				content: data.subscribecontent
			};
		}, function(ata, status, headers, config) {

		});
	};
	$scope.save = function(url) {
		$http.post(url, $.param($scope.welcome), {
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).success(function(data) {
			toaster.pop(data.status, '提示', data.msg);
		}).error(function() {
			toaster.pop('error', '提示', '操作失败');
		});
	}

	init();
}]);

$(function () {
  	$('.navbar-toggle-sidebar').click(function () {
  		$('.navbar-nav').toggleClass('slide-in');
  		$('.side-body').toggleClass('body-slide-in');
  		$('#search').removeClass('in').addClass('collapse').slideUp(200);
  	});

  	$('#search-trigger').click(function () {
  		$('.navbar-nav').removeClass('slide-in');
  		$('.side-body').removeClass('body-slide-in');
  		$('.search-input').focus();
  	});
});