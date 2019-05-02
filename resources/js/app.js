require('./bootstrap');

var form = document.getElementById("createTaskForm");

form.addEventListener("submit", function (event) {
    event.preventDefault()

    var formData = new FormData(event.target)

    data = {
        title: formData.get('title'),
        description: formData.get('description')
    }

    postData(`/tasks`, data)
        .then(data => Turbolinks.visit(data.redirect))
        .catch(error => console.error(error))
})

function postData(url = ``, data) {
    let token = document.head.querySelector('meta[name="csrf-token"]')

    return fetch(url, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            "Content-Type": "application/json",
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': token.content
        }
    })
    .then(response => response.json())
}
