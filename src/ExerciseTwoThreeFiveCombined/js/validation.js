$(function() {
	$('[data-validation-form]').on('submit', function (e) {
		if (!validation.isFormValid()) {
			e.preventDefault();
		}
	});
});

var validation = {
	isFormValid: function() {
		var validationStatus = true;

		$('.form-control, .form-check-input').each(function(index, element) {
			if ($(element).data('validation-required') !== undefined) {
				if (!validation.hasValue(element)) {
					$(element).siblings('.invalid-feedback[data-validation-required]').css({display: 'block'});
					$(element).addClass('is-invalid');
					validationStatus = false;
				} else {
					$(element).siblings('.invalid-feedback[data-validation-required]').css({display: 'none'});
					$(element).removeClass('is-invalid');
				}
			}

			if ($(element).data('validation-number-between') !== undefined) {
				var min = Number($(element).data('validation-value-min'));
				var max = Number($(element).data('validation-value-max'));

				if (!validation.isNumberBetween(element, min, max)) {
					$(element).siblings('.invalid-feedback[data-validation-number-between]').css({display: 'block'});
					$(element).addClass('is-invalid');
					validationStatus = false;
				} else {
					$(element).siblings('.invalid-feedback[data-validation-number-between]').css({display: 'none'});
					$(element).removeClass('is-invalid');
				}
			}

			if ($(element).data('validation-checked') !== undefined) {
				if (!validation.isChecked(element)) {
					$(element).parent('.form-check').siblings('.invalid-feedback[data-validation-checked]').css({display: 'block'});
					$(element).addClass('is-invalid');
					validationStatus = false;
				} else {
					$(element).parent('.form-check').siblings('.invalid-feedback[data-validation-checked]').css({display: 'none'});
					$(element).removeClass('is-invalid');
				}
			}
		});

		return validationStatus;
	},
	hasValue: function(element) {
		return String($(element).val()).trim() !== '';
	},
	isChecked: function(element) {
		return $(element).prop('checked');
	},
	isNumberBetween: function(element, min, max) {
		var value = Number($(element).val());
		return (value >= min && value <= max);
	}
};

