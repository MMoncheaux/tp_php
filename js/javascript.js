(function () {

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

    var bindErrors = function (element) {
        var node = document.querySelector(element)
        var condition = node.getAttribute('data-cond')
        if(condition !== null){
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

    }


    var all = document.querySelectorAll('input')
    all.forEach(function (v) {
        if (v.id) {
            bindErrors("#" + v.id);
        }
    })

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

})()