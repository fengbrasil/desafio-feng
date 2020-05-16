let btnNewRequest = document.querySelectorAll('.btn-new-request');

btnNewRequest.forEach (element => {
    element.addEventListener('click', () => {

        let id = element.dataset.id;

        let payload = {id: id};
        let url = `/pedidos/novo`;

        sendPOST(payload, url);
        
    });
});

function sendPOST (payload, url)
{
    let form = document.createElement('form');
    form.style.visibility = 'hidden'; 
    form.method = 'GET';
    form.action = url;
    for (const key in payload) {
        let input = document.createElement('input');
        input.name = key;
        input.type = 'text'
        input.value = payload[key];
        form.appendChild(input);
    }
    
    document.body.appendChild(form);
    form.submit();
}