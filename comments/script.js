var base_url = `http://localhost:8888/tic-tac-toe-php-examples/comments/`;
function postSubmit(ev, callback) {
    ev.preventDefault();//предотвращает действия по умолчанию. Страница не перезагрузится
    var url = this.getAttribute('action');// содержит всю форму. вызываем метод из объекта
    var form = this;
    var data = new FormData(this);//создаем объект из класса data. сюда входит Массив из формы
//отсылает данные при submite.
  
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var response = JSON.parse(this.response);
        if (!response.hasOwnProperty('error')) {
            callback(form, response);
        }
    }
};
xhttp.open("POST", url, true);
xhttp.send(data);
}
function postFromLink(ev) {
    ev.preventDefault();
    var url = this.getAttribute('href');
    var element = this.parentElement;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callback(this.response);
        }
    };
    xhttp.open("POST", url, true);
    xhttp.send();
}

function addElement(form,data) {
  
    var ul = document.querySelector('.entry-list');
    var new_li = document.createElement('li');
//Метод bind() создаёт новую функцию, которая при вызове устанавливает в качестве контекста
// выполнения this предоставленное значение. В метод также передаётся набор аргументов, которые 
//будут установлены перед переданными в привязанную функцию аргументами при её вызове.
    new_li.innerHTML = `
    <span>` + data.name + `</span> `
    + data.comment +
    `<a href="update.php?update=` + data.id + `">Update</a>
    <a href="request.php?delete=` + data.id + `" class="delete" onclick="postFromLink.bind(this)(event)">x</a>
'`;
form.querySelector('input').value = '';
form.querySelector('textarea').value = '';

    ul.append(new_li);
}

function updateElement(form, data) {
    location.href = base_url;
}

function deleteListElement(element) {
    element.remove();
}


