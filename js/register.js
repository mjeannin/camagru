function deactivateTooltips() {
    var tooltips = document.querySelectorAll('.tooltip'),
        tooltipsLength = tooltips.length;
    for (var i = 0; i < tooltipsLength; i++) {
        tooltips[i].style.display = 'none';
    }
}

function getTooltip(elements) {
    while (elements = elements.nextSibling) {
        if (elements.className === 'tooltip') {
            return elements;
        }
    }
    return false;
}

var check = {};

check['lastName'] = function(id) {
    var name = document.getElementById(id),
        tooltipStyle = getTooltip(name).style;
    if (name.value.length >= 2) {
        name.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        name.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }
};

check['firstName'] = check['lastName'];

check['login'] = function() {
    var login = document.getElementById('login'),
        tooltipStyle = getTooltip(login).style;
    if (login.value.length >= 4) {
        login.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        login.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }
};

check['pwd1'] = function() {
    var pwd1 = document.getElementById('pwd1'),
        tooltipStyle = getTooltip(pwd1).style;
    if (pwd1.value.length >= 6) {
        pwd1.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        pwd1.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }
};

check['pwd2'] = function() {
    var pwd1 = document.getElementById('pwd1'),
        pwd2 = document.getElementById('pwd2'),
        tooltipStyle = getTooltip(pwd2).style;
    if (pwd1.value == pwd2.value && pwd2.value != '') {
        pwd2.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        pwd2.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }
};

(function() {
    var myForm = document.getElementById('form'),
        inputs = document.querySelectorAll('input[type=text], input[type=password]'),
        inputsLength = inputs.length;
    for (var i = 0; i < inputsLength; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            check[e.target.id](e.target.id);
        });
    }

    myForm.addEventListener('submit', function(e) {
        var result = true;
        for (var i in check) {
            result = check[i](i) && result;
        }
        if (result) {
            alert('Formulaire complet.');
        }
        e.preventDefault();
    });

    myForm.addEventListener('reset', function() {
        for (var i = 0; i < inputsLength; i++) {
            inputs[i].className = '';
        }
        deactivateTooltips();
    });
})();

deactivateTooltips();