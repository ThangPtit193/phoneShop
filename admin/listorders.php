<?php 
require('includes/header.php');

?>
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
            /* max-height: cal(89% - 1.6rem); */
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
        .page-link {
            border-radius: 20px;
            margin-right: 5px;
            transition: all 0.5s ease;
        }

        .page-link:hover {
            background-image: linear-gradient(to right, #51cddf, #0451b0);
        }
        .hide{
            display:none;
        }
        .page-link:hover .textcs{
            color:white;
        }
        @media (max-width:767px){
            td:not(:first-of-type){
            min-width: 12.1rem;
        }
        .table thead{
            display:none
        }
        .table, table tbody, .table tr, .table td{
            display:block;
            width:100%;
        }
        .table tr{
            margin-bottom: 15px;
        }
        
        .table td{
            text-align: right;
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
            height: 100px;
        }
        }
    </style>
        <!-- Content Row -->
    <div class="history_container container-fluid">
      <div class="table">
        <section class="table_header">
          <h1 style="color:white;font-weight:bold">Đơn hàng</h1>
        </section>
        <section class="table_body">
          <table>
            <thead>
              <tr>
              <th>STT</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>                   
                        <th>Hành động</th>
              </tr>
            </thead>
            <tfoot>
                <tr>
                <th>STT</th>
                        <th>Số điện thoại </th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>                   
                        <th>Hành động</th>
                </tr>
            </tfoot>
            <tbody id="contentOrder">
                        
                </tbody>
            </table>
            <ul class="pagination d-flex justify-content-end">
                <li class="page-item"><a class="page-link"  id="pre"><span class="textcs text-black">Trước</span></a></li>
                <li class="page-item"><a class="page-link"  id="current"><span class="textcs text-black ">1</span></a></li>
                <li class="page-item"><a class="page-link"  id="next"><span class="textcs text-black">Sau</span></a></li>
            </ul>
            </section>
        </div>
    </div>
         
    <script src="js/getorders.js"></script>

      
<?php
require('includes/footer.php');
?>