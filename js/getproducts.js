const content = document.querySelector('#content');
let currentPage = 1;
let pageSize = 4;
let preButton = document.querySelector('#pre');
let nextButton = document.querySelector('#next');
let currentButton = document.querySelector('#current')
ajaxGetProducts();

async function ajaxGetProducts(){
    const res = await fetch(`http://localhost:8000/getproducts.php?page=${currentPage}&pageSize=${pageSize}`);
    const res2 = await res.json();
    console.log(res2);
    printData(res2);
    printPagi(res2);
}
function printData(data){
    let content_str = data.records.map(record => {
        // Tách chuỗi images thành các phần tử, sử dụng dấu chấm phẩy (;) làm phân tách
        const imagesArray = record.images.split(';');
        var discountedPrice = record.disscounted_price;
        var formattedPrice = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(discountedPrice);
        var formattedPriceWithCurrency = formattedPrice;
        // Lấy phần tử đầu tiên của mảng imagesArray
        const firstImage = imagesArray[0];

        // Tạo chuỗi HTML sử dụng phần tử đầu tiên của mảng imagesArray
        return `
        <div class="col-lg-3 col-md-4 col-sm-6 mix ${record.cslug} fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic" >
                    <img src="/admin/${firstImage}" alt="">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="featured__item__text" >
                    <h6><a href="sanpham.php?id=${record.pid}">${record.pname}</a></h6>
                    <h5>${formattedPriceWithCurrency}</h5>
                </div>
            </div>
        </div>
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
