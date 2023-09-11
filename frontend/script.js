const syncForm = document.querySelector('.sync-form__form');
const syncResults = document.getElementById('sync-results');
syncForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    syncResults.innerText = 'Running Test';

    const startTimestamp = Date.now();

    const response = await fetch(
        '/api/dashboard',
        {
            headers: {
                "Content-Type": "application/json",
            }
        }
    );
    const data = await response.json();

    const endTimestamp = Date.now();
    syncResults.innerText = 'Request took ' + (endTimestamp - startTimestamp) + ' ms.'

    console.log(data);
})

const asyncForm = document.querySelector('.async-form__form');
const asyncResults = document.getElementById('async-results');
asyncForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    asyncResults.innerText = 'Running Test';

    const startTimestamp = Date.now();

    const response = await fetch(
        '/api/async-dashboard',
        {
            headers: {
                "Content-Type": "application/json",
            }
        }
    );
    const data = await response.json();

    const endTimestamp = Date.now();
    asyncResults.innerText = 'Request took ' + (endTimestamp - startTimestamp) + ' ms.'

    console.log(data);
})
