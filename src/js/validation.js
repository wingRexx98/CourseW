(function () {
    'use strict';

    $(document).ready(function () {

        let form = $('.bootstrap-form');
        let allInput = $(':input');

        // On form submit take action, like an AJAX call
        $(form).submit(function (e) {

            if (this.checkValidity() === false) {
                $(this).addClass('was-validated');
                e.preventDefault();
                e.stopPropagation();
            }

        });

        // On every :input focusout validate if empty
        allInput.blur(function () {
            let fieldType = this.type;

            switch (fieldType) {
                case 'email':
                case 'password':
                    validateText($(this));
                    break;
                default:
                    break;
            }
        });

        //Update value range on sliding
        $('#price').on('input', function () {
            let newValue = this.value;
            $('#rangeValue').text(newValue);
        });


        // On every :input focusin remove existing validation messages if any
        allInput.click(function () {

            $(this).removeClass('is-valid is-invalid');

        });

        // On every :input focusin remove existing validation messages if any
        allInput.keydown(function () {

            $(this).removeClass('is-valid is-invalid');

        });

        // Reset form and remove validation messages
        $(':reset').click(function () {
            $(':input, :checked').removeClass('is-valid is-invalid');
            $(form).removeClass('was-validated');
        });

    });

    // Validate Text (require more than one character)
    function validateText(thisObj) {
        let fieldValue = thisObj.val();
        if (fieldValue.length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    //Validate

    function onConfirm() {
        alert('works');
    }

    $('#submit').click(function (event) {
        navigator.notification.confirm(
            'win',
            onConfirm,
            '?',
            ['Restart', 'Exit']
        );
    });
})();
