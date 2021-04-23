const form = document.querySelector("#comment-form")

form.addEventListener("submit", (ev) => {
    ev.preventDefault()

    console.log({ev})
    const path = window.location.pathname.split('/');
    const id = path[path.length - 1];

    const data = new FormData(ev.target)
    const value = Object.fromEntries(data.entries())
    console.log(value);

    fetch(`/posts/${id}/comments`, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': value._token
        }, method: 'POST', body: JSON.stringify(value)
    })
        .then(d => d.json())
        .then(comment => {
            const postComment = `
                    <div class="d-flex">
                        <div>
                            <h5>
                                <a href="">${comment.user.name}</a>
                                <a href="#" class="reply">
                                    <i class="bi bi-reply-fill"></i> Reply
                                </a>
                            </h5>
                            <a> </a>
                            <p> ${comment.body} </p>
                        </div>
                    </div>`;

            const div = document.createElement('div')
            div.classList.add('comments')
            div.innerHTML = postComment

            console.log(postComment);

            const data = document.getElementById("comments");
            console.log({data});
            data.prepend(div)
        })
})
