const content = document.querySelector('#contentOrder');
let currentPage = 1;
let pageSize = 6;
let stt = 0;
let preButton = document.querySelector('#pre');
let nextButton = document.querySelector('#next');
let currentButton = document.querySelector('#current');

const styles = `
    <style>
        .history_container{
            display:flex;
            justify-content: center;
            margin-top: 30px;
            overflow-y: scroll;
            margin-bottom: 30px;
        }
        .table{
            width: 82vw;
            height: 90vh;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow-y: scroll;
            margin-top: 5px;
            text-align: center;
        }
        .table_header{
            width:100%;
            height: 10%;
            /* background-color: #fff4; */
            background: linear-gradient(to right, #0d5cb4,#4bc0da);
            border-radius: 15px;
            display:flex;
            justify-content: center;
            align-items: center;
            /* padding: .8rem .1rem; */
        }
        table{
            width: 100%;

        }
        .table_body{
            width:95%;
            background-color: #fffb;
            margin: .8rem auto;
            border-radius: .6rem;

        }

        .table::-webkit-scrollbar{
            width: 0.5rem;

        }
        .table::-webkit-scrollbar-thumb{
            border-radius: .5rem;
            background-color: gray;
            visibility: hidden;
        }
        .table:hover::-webkit-scrollbar-thumb{
            visibility: visible;
        }

        thead th{
            position:sticky;
            top:0;
            /* left:0; */
            background-color: #d5d1de;

        }
        tbody tr:nth-child(even){
            background-color: #0000000b;
        }
        tbody tr:hover{
            background-color: gray;
        }
        tbody tr:hover td{
            color:white;
        }
        .table, th, td{
            padding: 1rem;
            text-align: center;
            border-collapse: collapse;
        }
        .Processing{
            padding: .4rem .5rem;
            border-radius: 2rem;
            background: linear-gradient(to right, gold, #FFFF33);
            margin:0;
            text-align: center;
        }
        .Delivered{
            padding: .4rem .5rem;
            background: linear-gradient(to right, #00FF00, #CCFF66);
            border-radius: 2rem;
            text-align: center;
            margin:0;
        }
        .Shipping{
            padding: .4rem .5rem;
            border-radius: 2rem;
            background: linear-gradient(to right, #FF6600, #FFFF33);;
            margin:0;
            text-align: center;
        }
        .Cancelled{
            padding: .4rem .5rem;
            border-radius: 2rem;
            background: linear-gradient(to right, #FF0000, #CC3333);
            margin:0;
            text-align: center;
        }
        .Confirmed{
            padding: .4rem .5rem;
            border-radius: 2rem;
            background: linear-gradient(to right, #51cddf, #99FFFF);
            margin:0;
            text-align: center;
        }
        @media (max-width:767px){
            td:not(:first-of-type){
            min-width: 12.1rem;
        }
        .table thead{
            display:none
        }
        .table tfoot{
            display:none;
        }
        .table, table tbody, .table tr, .table td{
            display:block;
            width:100%;
        }
        .table tr{
            margin-bottom: 15px;
        }

        .table td{
            padding-left: 50%;
            text-align: right;
            position: relative;
        }
        .table td::before{
            content:attr(data-label);
            position: absolute;
            left:0;
            width:50%;
            padding-left: 15px;
            font-size: 15px;
            font-weight: bold;
            text-align: left;
        }
    </style>
`;
document.head.insertAdjacentHTML('beforeend', styles);
ajaxGetProducts();

async function ajaxGetProducts(){
    const res = await fetch(`http://localhost:8000/admin/getorders.php?page=${currentPage}&pageSize=${pageSize}`);
    const res2 = await res.json();
    console.log(res2);
    printData(res2);
    printPagi(res2);
}
function printData(data){
    let content_str = data.records.map(record => {
        stt++;
        const statusLabels = {
            'Processing': 'Đang xử lý',
            'Shipping': 'Đang giao hàng',
            'Delivered': 'Đã giao hàng',
            'Cancelled': 'Đã hủy',
            'Confirmed': 'Đã xác nhận'
        };
        var formattedPrice = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(record.total);
        const statusText = statusLabels[record.status] || record.status;
        return `
        <tr>
            <td data-label="STT">${stt}</td>
            <td data-label="Số điện thoại">${record.phone}</td>
            <td data-label="Ngày đặt">${record.created_at}</td>
            <td data-label="Tổng tiền">${formattedPrice}</td>
            <td data-label="Trạng thái"><span class='${record.status}'>${statusText}</span></td>
            <td data-label="Hành động">
                <a class="btn btn-warning" href="vieworders.php?id=${record.id}"><i class="fas fa-virus"></i></a>  
                
            </td>
            
        </tr>
        `;
    }).join('');
    content.innerHTML = content_str;
}
function printPagi(data){
    let maxPage = Math.floor(data.total_counts / pageSize) + 1;
    current.innerHTML = currentPage;
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
