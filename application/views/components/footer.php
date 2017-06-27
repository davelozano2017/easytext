<script src="<?= site_url('assets/js/jquery.min.js')?>"></script>
<script src="<?= site_url('assets/lib/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?= site_url('assets/angular/angular-main.min.js')?>"></script>
<script src="<?= site_url('assets/angular/1.4.2.angular.min.js')?>"></script>
<script charset="utf-8">

(function() {
  "use strict";
  angular
    .module('validationApp', ['ngMessages'])
    .controller('mainController', mainController)
    .directive('passwordVerify', passwordVerify);

  function mainController($scope) {
    // Some code
  }

  function passwordVerify() {
    return {
      restrict: 'A', // only activate on element attribute
      require: '?ngModel', // get a hold of NgModelController
      link: function(scope, elem, attrs, ngModel) {
        if (!ngModel) return; // do nothing if no ng-model

        // watch own value and re-validate on change
        scope.$watch(attrs.ngModel, function() {
          validate();
        });

        // observe the other value and re-validate on change
        attrs.$observe('passwordVerify', function(val) {
          validate();
        });

        var validate = function() {
          // values
          var val1 = ngModel.$viewValue;
          var val2 = attrs.passwordVerify;

          // set validity
          ngModel.$setValidity('passwordVerify', val1 === val2);
        };
      }
    }
  }
})();
		   $("#register").submit(function(event){
	        event.preventDefault();
	        var form = $(this);
	        $.ajax({
	          url:  form.attr('action'),
	          type: 'post',
	          data: form.serialize(),
	          dataType: 'json',
	          processData: false,
            success:function(response)
            {
              if(response.success == true) {
                alert('aaa');
              }
            }
	        });
	    });

</script>
</body>
</html>
