const content = document.querySelector('#contentUser');
let currentPage = 1;
let pageSize = 6;
let preButton = document.querySelector('#pre');
let nextButton = document.querySelector('#next');
let currentButton = document.querySelector('#current');
let stt = 0;

ajaxGetProducts();

async function ajaxGetProducts(){
    const res = await fetch(`http://localhost:8000/admin/getusers.php?page=${currentPage}&pageSize=${pageSize}`);
    console.log("isAdmin", isAdmin);
    const res2 = await res.json();
    console.log(res2);
    printData(res2);
    printPagi(res2);
}

function printData(data){
    let content_str = data.records.map(record => {
        stt++;
        let adminButtons = isAdmin ? `
            <td>
                <a class="btn text-white" style="background: linear-gradient(to right, #0d5cb4,#4bc0da);" href="edituser.php?id=${record.id}">Cập nhật</a>  
                <a class="btn text-white" style="background: linear-gradient(to right, #FF0000, #CC3333);" href="deleteuser.php?id=${record.id}" onclick="return confirm('Bạn chắc chắn xóa người dùng này?');">Xóa</a>
            </td>` : '';

        return `
            <tr>
                <td>${stt}</td>
                <td>${record.name}</td>
                <td>${record.email}</td>
                <td>${record.type}</td>
                <td>${record.status}</td>
                ${isAdmin ? adminButtons : ''}
            </tr>
        `;
    }).join('');
    content.innerHTML = content_str;
}

function printPagi(data){
    let maxPage = Math.floor(data.total_counts / pageSize) + 1;
    currentButton.innerHTML = currentPage;
    if(currentPage < maxPage){
        nextButton.classList.remove('hide');
        preButton.classList.remove('hide');
    }
    if(currentPage === maxPage) nextButton.classList.add('hide');
    if(currentPage === 1){
        preButton.classList.add('hide');
    }
}

nextButton.addEventListener('click', function(){
    currentPage++;
    ajaxGetProducts();
});

preButton.addEventListener('click', function(){
    currentPage--;
    ajaxGetProducts();
});
