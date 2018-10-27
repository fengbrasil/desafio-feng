function setStorage(key, data) {
    localStorage.setItem(key, data);
}

function getStorage(key) {
    return localStorage.getItem(key);
}

function addItem() {
    var amount = $('#amount').val();
    var item = $('#item_id option:selected').val();
    item = JSON.parse(item);

    if(aux = getStorage(item.id)) {
        amount = parseInt(amount) + parseInt(aux);
        $('#item_' + item.id).remove();
    }

    $('#tableItems').append(`
        <tr id="item_${item.id}">
            <td>${item.name}</td>
            <td>${amount}</td>
            <td>${item.vl_unitary}</td>
            <td>${amount*item.vl_unitary}</td>
            <td class="remover" data-id="${item.id}">Remover</td>
        </tr>
    `)
    setStorage(item.id,amount);


}


$(document).ready(function(){
    localStorage.clear();

    $('#addItem').click(function(e){
        e.preventDefault();
        addItem();
    });

    $(document).on('click','.remover',function(e){
        e.preventDefault();
        let key = $(this).attr('data-id');
        $(this).parent().remove();
        localStorage.removeItem(key);
    })

    $('#storeOrder').click(function(e){
        e.preventDefault();

        let item = new Array;
        for(i=0;i<localStorage.length;i++){
            let key = localStorage.key(i);
            item.push({'item_id':key,'amount':localStorage.getItem(key)})
        }

        let data = {
            'dt_order': $('#dt_order').val(),
            'client_id': $('#client_id').val(),
            "_token": $('#token').val(),
            'item': item,
        }

        $.post('/order',data).done(function(result){
            window.location.href = '/order';
        });
    });
});