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
        if (condition !== null) {
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
    
    var addVilleOptions = function (options) {
        ComboModuleResetOptions(combo)
        options.forEach(function (v) {
            combo = ComboModuleAddOption(combo, v.ville_id, v.ville_nom)
        })
    }

    var getVilles = function (inputcp) {
        if (inputcp.value.length == 5 && !isNaN(inputcp.value)) {
            var xhr = new XMLHttpRequest()
            xhr.open('POST', 'ajax.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText)
                    addVilleOptions(data)
                }
            }
            var params = new FormData()
            params.append('cp', inputcp.value)

            xhr.send(params)
        }
    }

    var inputcp = document.querySelector('#code-postal')
    getVilles(inputcp)
    inputcp.addEventListener('input', function (e) {
        getVilles(this)
    })

    var ComboModuleToggle = function (button, divoptions) {
        if (divoptions.classList.contains('close')) {
            divoptions.classList.toggle('close')
            button.innerHTML = "/\\"
        } else {
            divoptions.classList.toggle('close')
            button.innerHTML = "\\/"
        }
    }

    var ComboModuleAddOption = function (combo, value, text){
        var divoptions = combo.querySelector('#combo-options')
        option = document.createElement("div");
        option.innerHTML = text;
        option.setAttribute('value', value)
        option.classList.add('combo-option')
        divoptions.appendChild(option)
        combo = ClearListener(combo)
        ComboModuleRefresh(combo)
        return combo
    }

    var ClearListener = function(element){
        var cleanlistener = element.cloneNode(true);
        element.parentNode.replaceChild(cleanlistener, combo)
        return cleanlistener
    }

    var ComboModuleRefresh = function (combo) {
        var button = combo.querySelector('#combo-arrow')
        var text = combo.querySelector('#combo-text')
        var divoptions = combo.querySelector('#combo-options')
        var comboinput = combo.querySelector('#combo-input')
        button.addEventListener('click', function(){ComboModuleToggle(button, divoptions)})
        options = divoptions.querySelectorAll('.combo-option')
        options.forEach(function (option) {
            option.addEventListener('click', function () {
                var value = this.getAttribute('value')
                text.innerHTML = this.innerHTML
                comboinput.value = value
                ComboModuleToggle(button, divoptions)
            })
        })
    }

    var ComboModuleResetOptions = function(combo){
        var divoptions = combo.querySelector('#combo-options')
        divoptions.innerHTML = ''
    }
    var combo = document.querySelector("#combo-module")
    ComboModuleRefresh(combo);


})()
