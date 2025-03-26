document.addEventListener('DOMContentLoaded', function (e) {
    const ADD = document.querySelector('.todo__btn');
    let inProgresDIV = document.querySelector('.group__in-progress');
    let completedDIV = document.querySelector('.group__completed');

    e.preventDefault(); // Предотвращаем отправку формы
    ADD.addEventListener('click', function (e) {
        e.preventDefault(); // Предотвращаем отправку формы
        let taskTEXT = document.querySelector('.todo__task');
        if (taskTEXT.value != "") {
            e.preventDefault();
            // inProgresDIV.innerHTML += "<div class='task'><p class='task__text'>" + taskTEXT.value + "</p><button class='delete'>Delete</button><button class='completed'>Completed</button></div>";
            inProgresDIV.innerHTML += "<div class='task'><input class='task__text' name='progres[]' value='" + taskTEXT.value + "'><button class='delete'>Delete</button><button class='completed'>Completed</button></div>";
            taskTEXT.value = "";
            updateTaskHandlers();
        } else {
            alert("Please add a task");
        }
    });

    function updateTaskHandlers() {
        let completed = document.querySelectorAll('.completed');
        let delet = document.querySelectorAll('.delete');
        
        completed.forEach((btn) => {
            btn.onclick = function () {
                e.preventDefault(); // Предотвращаем отправку формы
                btn.parentElement.querySelector('input').name = 'completed[]';
                let task = btn.parentElement;
                completedDIV.appendChild(task);
                btn.remove();
                updateTaskHandlers();
            };
        });

        delet.forEach((btn) => {
            btn.onclick = function () {
                e.preventDefault(); // Предотвращаем отправку формы
                btn.parentElement.remove();
            };
        });
    }
});