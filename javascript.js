/*
(function($)
{
    $(document).ready(function()
    {
        var $els = $('[cl-validate-not-empty]');

        $els.on('keyup keypress', function (e) {
            var $el = $(e.target);
            if ($el.val().length > 0) {
                $el.removeClass('erreur');
                $el.parent().siblings('span.erreur:first').hide();
            }
        });

        $els.blur(function(e) {
            var $el = $(e.target);
            if ($el.val().length <= 0) {
                $el.addClass('erreur');
                $el.parent().siblings('span.erreur:first').show();
            }
        });
    });
})(jQuery);
    */