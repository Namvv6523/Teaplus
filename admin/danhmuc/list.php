<main class="w-100 d-f f-d">
          <h3 style="text-align: center; padding-bottom: 20px;">Quản Lý Loại Hàng</h3>
          <div class="search_list-product-admin w-100">
            <form action="" class="form_sp">
                <table class="table_sp">
                    <thead>  
                        <th class="th_sp">MÃ LOẠI</th>
                        <th class="th_sp">TÊN LOẠI</th>
                        <th class="th_sp">CHỨC NĂNG</th>

                    </thead>
                             <!-- php -->
                    <?php 
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm="index.php?act=suadm&id=".$id;
                        $xoadm="index.php?act=xoadm&id=".$id;
                        echo '<tr>
                                <td class="td_sp">' . $id . '</td>
                                <td class="td_sp">' . $namedm . '</td>
                                <td class="td_sp"> 
                                <a href="'. $suadm.'"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="'. $xoadm.'"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>';
                    }
                    ?>
                  </table>
            </form>
                 
          </div>
        </main>
