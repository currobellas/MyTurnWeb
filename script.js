document.getElementById('accessForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const code = document.getElementById('accessCode').value;

    fetch('add_to_queue.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'code=' + encodeURIComponent(code)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            updateQueue(data.queue);
        } else {
            alert(data.message);
        }
    });
});

function updateQueue(queue) {
    const queueList = document.getElementById('queueList');
    queueList.innerHTML = '';
    queue.forEach(user => {
        const li = document.createElement('li');
        li.textContent = user;
        queueList.appendChild(li);
    });
}

function fetchQueue() {
    fetch('queue.php')
    .then(response => response.json())
    .then(data => {
        updateQueue(data);
    });
}

fetchQueue();
setInterval(fetchQueue, 5000);
