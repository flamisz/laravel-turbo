require('./bootstrap');
document.addEventListener("turbolinks:load", function() {
    var form = document.getElementById("createTaskForm")

    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault()

            var formData = new FormData(event.target)

            data = {
                title: formData.get('title'),
                description: formData.get('description')
            }

            postData(`/tasks`, data)
                .then(data => {
                    if (data.redirect) {
                        Turbolinks.visit(data.redirect)
                    }

                    if (data.errors){
                        let errorKey = Object.keys(data.errors)[0]
                        document.getElementById("createTaskFormErrorText").textContent = data.errors[errorKey][0]
                        document.getElementById("createTaskFormError").classList.remove('d-none')
                    }
                })
                .catch(error => console.error(error))
        })
    }
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
