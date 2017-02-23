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


(function ($) {

    var unBindError = function (element) {
        element.classList.remove('erreur')
        var errspan = element.parentElement.querySelectorAll('span')
        errspan.forEach(function (v) {
            v.remove()
        })
    }
    var showError = function (element, texte) {
        unBindError(element)
        element.classList.add('erreur')
        var span = document.createElement("span")
        span.classList.add('erreur')
        span.innerHTML = texte
        element.parentElement.appendChild(span);
    }

    var bindErrors = function (element, condition, texte) {
        var node = document.querySelector(element)
        node.addEventListener('input', function (e) {
            if (eval(condition)) {
                unBindError(node)
            } else {
                showError(node, texte)
            }
        })
    }

    var bindErrorsUpdate = function (element, condition) {
        var node = document.querySelector(element)
        node.addEventListener('input', function (e) {
            if (eval(condition)) {
                unBindError(node)
            } else {
                showError(node, node.getAttribute('data-error'))
            }
        })
    }

    var bindErrorsUpdate2 = function (element) {
        var node = document.querySelector(element)
        var condition = node.getAttribute('data-cond')
        var error = node.getAttribute('data-error')
        node.removeAttribute('data-cond')
        node.removeAttribute('data-error')
        node.addEventListener('input', function (e) {
            if (eval(condition)) {
                unBindError(node)
            } else {
                showError(node, error)
            }
        })
    }


    var all = document.querySelectorAll('input')
    all.forEach(function (v) {
        if (v.id) {
            bindErrorsUpdate2("#" + v.id);
        }
    })
    /*
     bindErrors('#telephone-portable', 'this.value != "" && !isNaN(this.value)', "Veuillez indiquer un tel valide");
     bindErrors('#nom', 'this.value != "" && isNaN(this.value)', "Veuillez indiquer un nom valide");
     bindErrors('#telephone-fixe', 'this.value != "" && !isNaN(this.value)', "Veuillez indiquer un tel valide");
     */

    var addOption = function(element, key, value){
        var option = document.createElement("option");
        option.text = value;
        option.value = key
        element.add(option);
    }

    var addVilleOptions = function(options){
        inputville = document.querySelector('#ville')
        options.forEach(function(v){
            addOption(inputville, v.ville_id, v.ville_nom)
        })
    }

    var inputcp = document.querySelector('#code-postal')
    inputcp.addEventListener('input', function (e) {
        if (this.value.length == 5 && !isNaN(this.value)) {
 
            var xhr = new XMLHttpRequest()
            xhr.open('POST', 'ajax.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText)
                    addVilleOptions(data)
                }
            }
            var params = new FormData()
            params.append('cp', this.value)

            xhr.send(params)
        }
    })

})(jQuery)