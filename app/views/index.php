<!doctype html>
<html xmlns:ng="http://angularjs.org" id="ng-app" ng-app="openlogix" >
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta charset="UTF-8">
	<title>OpenLogix Example</title>
	<link rel="stylesheet" href="dist/main.css">
</head>
<body>

	<div class="container-fluid">
		<div ng-view>

		</div>
	</div>

	<script src="dist/vendor.js"></script>
  <script src="dist/main.js"></script>
	<script>
    angular.module("openlogix").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
  </script>
</body>
</html>
