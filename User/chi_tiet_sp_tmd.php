<?php
session_start();
include('../BackendPHP/ket-noi-tmd.php');

if (isset($_GET['act']) && $_GET['act'] == 'logout') {
    unset($_SESSION['user_id']);
    header("Location: Trangchu-tmd.php");
    exit();
}

if (isset($_GET['spid']) && $_GET['spid']) {
    $SPID_TMD = $_GET['spid'];
    $sql_ctsp_tmd = "SELECT * FROM SANPHAM_TMD WHERE SPID_TMD = '$SPID_TMD'";
    $res_ctsp_tmd = $conn_tmd->query($sql_ctsp_tmd);
    $row = $res_ctsp_tmd->fetch_array();
}

$sql_select_tmd = "";

if (isset($_GET['sub_srch_tmd'])) {
    $keyword = mysqli_real_escape_string($conn_tmd, $_GET['timkiem_tmd']);
    $sql_select_tmd .= " AND TENSP_TMD LIKE '%$keyword%'";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1 - Trần Minh Đức - 2210900014</title>
    <link rel="stylesheet" href="../Style/main3.css">
    <script src="../Js/c.js"></script>
</head>

<body>
    <header>
        <div class="infor_tmd">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
            </svg>
            <span>Chùa Võ, Dương Nội, Hà Đông, Hà Nội</span>
            <div class="contact_icons_tmd">
                <a href="tel:0855312279" title="Follow on Phone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/channel/UCjRCdsqYT4EJ-U9Eb-Rie8Q" title="Follow on YouTube">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-youtube" viewBox="0 0 16 16">
                        <path
                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.260.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                    </svg>
                </a>
                <a href="mailto:dinhhoangducdbp2004@gmail.com" title="Follow on Gmail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100013901885587" title="Follow on Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="cover-menu_tmd">
            <div class="logo_search_menu_tmd">
                <img src="../Img/logo.jpg" alt="" class="logo_TMD">
                <div class="srch_tmd">
                    <form action="" method="get">
                        <input type="search" placeholder="Tìm kiếm...." name="timkiem_tmd">
                        <input type="submit" name="sub_srch_tmd" value="Tìm kiếm">
                </div>
                </form>
                <div class="menu_tmd">
                    <a class="menu_link_tmd" href="#" title="Giỏ hàng">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-basket2-fill" viewBox="0 0 16 16">
                            <path
                                d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z" />
                        </svg>
                        <span id="cartCount">0</span>
                    </a>
                    <a class="menu_link_tmd" href="tracuu_tmd.php" title="Tra cứu đơn hàng">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                            <path
                                d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z" />
                        </svg>
                    </a>
                    <?php
                    if (isset($_SESSION['user_id']) && ($_SESSION['user_id']) != "") {
                        ?>
                        <button class="btnstrlogin" onclick="toggleDropdown()" title="<?php echo $_SESSION['user_id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                        </button>
                        <ul id="dropdown">
                            <li><a href="#">Thông tin cá nhân</a></li>
                            <li><a href="Trangchu-tmd.php?act=logout">Đăng xuất</a></li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <a class="menu_link_tmd" href="login_tmd.php" title="Đăng nhập">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                        </a>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>

        <div class="list_items_tmd">
            <ul class="ul_tmd">
                <li><a href="Trangchu-tmd.php">TRANG CHỦ</a></li>
                <li><a href="#">GIỚI THIỆU</a></li>
                <li><a href="#">LAPTOP VĂN PHÒNG</a></li>
                <li><a href="#">LAPTOP GAMING</a></li>
                <li><a href="#">BLOGS</a></li>
                <li><a href="#">LIÊN HỆ</a></li>
            </ul>
        </div>
    </header>
    <div class="product_container_tmd">
        <div class="product_main_tmd">
            <div id="menu_sp_tmd" class="row mb-0">
                <div class="product-gallery large-6">
                    <div class="product_img">
                        <img src="../Img/<?php echo $row['IMG_TMD']; ?>" alt="">
                    </div>
                </div>
                <div class="product-info">
                    <div class="link_sile">
                        <a href="Trangchu-tmd.php">Trang chủ</a>
                        <span class="divider">/</span>
                        <a href="#">Sản phẩm</a>
                    </div>
                    <h1>
                        <?php echo $row['TENSP_TMD']; ?>
                    </h1>
                    <div class="is-divider small"></div>
                    <div>
                        <p class="price">
                            <?php
                            if ($row['GIAMGIA_TMD'] == 1) {
                                echo '<span class="money">' . $row['GIADAGIAM_TMD'] . '<del style="color:#333">' . $row['GIAGOC_TMD'] . '</del></span><br>';
                            } else {
                                echo '<span class="money">' . $row['GIAGOC_TMD'] . '</span><br>';
                            }
                            ?>
                        </p>
                    </div>
                    <div class="mota_sp">
                        <p>
                            <?php echo $row['MOTA_TMD']; ?>
                        </p>
                        <p>
                            <?php echo $row['DONGSP_TMD']; ?>
                        </p>
                        <form action="cart_products_tmd.php" method="post">
                            <div class="buttons_added">
                                <input type="button" value="-" class="minus button is-form" onclick="decrement()">
                                <label class="screen-reader-text" for="quantity_ip"></label>
                                <input type="number" id="quantity_ip" class="input-text qty text" step="1" min="1"
                                    max="9999" name="soluong" value="1" size="4" pattern="[0-9]*" inputmode="numeric"
                                    aria-labelledby="">
                                <input type="button" value="+" class="plus button is-form" onclick="increment()">
                            </div>
                            <input type="hidden" name="anh" value="<?php echo $row['IMG_TMD']; ?>">
                            <input type="hidden" name="tensp" value="<?php echo $row['TENSP_TMD']; ?>">
                            <input type="hidden" name="giamgia" value="<?php echo $row['GIAMGIA_TMD'];
                            ; ?>">
                            <input type="hidden" name="giadagiam" value="<?php echo $row['GIADAGIAM_TMD'];
                            ; ?>">
                            <input type="hidden" name="giaban" value="<?php echo $row['GIABAN_TMD'];
                            ; ?>">
                            <input type="hidden" name="spid" value="<?php echo $SPID_TMD; ?>">
                            <input type="submit" name="btncart" class="cart_btn" value="THÊM GIỎ HÀNG">
                        </form>
                        <div class="row">
                            <div class="col">
                                <div class="col_su">
                                    <strong>Đơn vị vận chuyển</strong>
                                    <div class="Dvvc">
                                        <img src="../Img/Donvivanchuyen.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col_su">
                                    <strong>Phương thức thanh toán</strong>
                                    <div class="Dvvc">
                                        <img src="../Img/Nganhang.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="information">
        <h1>ĐĂNG KÝ NHẬN THÔNG TIN</h1>
        <div class="dang_ky_tmd">
            <input type="search" placeholder="Nhập thông tin...." name="srch-luu-email_tmd">
            <input type="submit" name="srch-luu_email_tmd" value="ĐĂNG KÝ">
        </div>
    </div>
    <div class="footer">
        <div class="ttlh_tmd">
            <h3>THÔNG TIN LIÊN HỆ</h3>
            <p><svg width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 440 440"
                    style="enable-background:new 0 0 440 440;" xml:space="preserve">
                    <g>
                        <path d="M340.57,241.141c-54.826,0-99.429,44.604-99.429,99.43c0,54.825,44.604,99.429,99.429,99.429S440,395.396,440,340.571
                        C440,285.745,395.396,241.141,340.57,241.141z M328.122,395.104l-58.807-58.807l21.213-21.213l37.594,37.594l56.035-56.034
                        l21.213,21.213L328.122,395.104z"></path>
                        <path
                            d="M166.62,119.397c-24.813,0-45,20.187-45,45s20.187,45,45,45c24.813,0,45-20.187,45-45S191.433,119.397,166.62,119.397z">
                        </path>
                        <path d="M326.984,211.853c4.067-14.39,6.256-29.559,6.256-45.234C333.24,74.745,258.494,0,166.62,0C74.746,0,0,74.745,0,166.619
                        c0,38.93,13.421,74.781,35.878,103.177L166.62,434.174l48.641-61.155c-2.688-10.373-4.12-21.247-4.12-32.448
                        C211.141,273.791,261.978,218.665,326.984,211.853z M91.62,164.397c0-41.355,33.645-75,75-75c41.355,0,75,33.645,75,75
                        s-33.645,75-75,75C125.265,239.397,91.62,205.752,91.62,164.397z"></path>
                    </g>
                </svg>
                Chùa Võ, Dương Nội, Hà Đông, Hà Nội
            </p>
            <a href="tel:0855312279">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" viewBox="0 0 612 612"
                    style="enable-background:new 0 0 612 612;" xml:space="preserve">
                    <g>
                        <path d="M586.923,256.013c-7.959-8.24-16.655-13.074-24.53-15.916c10.798-62.807,8.812-97.901-246.643-178.322
                            C55.771-20.07,26.688,13.85,5.274,81.869L1.622,93.471c-5.794,18.406,4.43,38.025,22.836,43.82l83.405,26.257
                            c18.407,5.794,38.025-4.43,43.82-22.836l3.652-11.602c16.587-52.69,97.773-28.905,143.76-14.428
                            c45.986,14.477,126.155,41.49,109.568,94.18l-3.653,11.601c-5.794,18.406,4.43,38.025,22.836,43.82l83.405,26.257
                            c18.406,5.795,38.025-4.429,43.82-22.835l2.369-8.038c4.933,2.036,10.229,5.149,15.123,10.215
                            c17.553,18.182,23.378,53.308,16.842,101.589c-11.335,83.657-44.21,113.537-79.221,123.481v-14.553
                            c0-14.775-3.693-29.4-11.181-42.179c-34.94-59.797-84.556-112.856-147.598-159.626v-35.34c0-2.745-2.246-4.992-4.991-4.992h-51.862
                            c-2.795,0-4.992,2.247-4.992,4.992v35.139h-59.199v-35.139c0-2.745-2.246-4.992-4.992-4.992H173.46
                            c-2.746,0-4.992,2.247-4.992,4.992v35.139C105.326,325.264,55.661,378.322,20.67,438.22C13.183,450.998,9.49,465.623,9.49,480.397
                            v32.894c0,46.87,37.985,84.855,84.854,84.855h330.984c46.136,0,83.581-36.824,84.745-82.679
                            c56.115-13.143,87.95-58.928,99.111-141.316C616.681,318.816,609.189,279.069,586.923,256.013z M346.544,481.271l-33.304-11.858
                            c3.533-7.12,5.57-15.115,5.57-23.606c0-29.35-23.809-53.159-53.208-53.159c-29.35,0-53.209,23.81-53.209,53.159
                            c0,29.4,23.859,53.21,53.209,53.21c10.87,0,20.965-3.271,29.386-8.859l18.266,30.026c-13.76,8.835-30.087,14.022-47.652,14.022
                            c-48.817,0-88.349-39.582-88.349-88.398c0-48.767,39.533-88.349,88.349-88.349c48.816,0,88.399,39.583,88.399,88.349
                            C354.001,458.429,351.311,470.408,346.544,481.271z"></path>
                    </g>
                </svg>
                0855312279
            </a>
            <a href="mailto:dinhhoangducdbp2004@gmail.com">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px"
                    viewBox="0 0 308.728 308.728" style="enable-background:new 0 0 308.728 308.728;"
                    xml:space="preserve">
                    <g>
                        <g>
                            <path
                                d="M153.188,27.208c-37.562,1.134-130,55.057-144.495,63.65l-7.981,32.664l40.236,28.809l-7.733-27.01l189.62-54.288
                                l26.895,93.949l58.098-41.331l-10.004-32.698C283.848,82.656,190.877,28.342,153.188,27.208z">
                            </path>
                            <polygon
                                points="308.728,281.52 308.728,195.199 308.728,160.289 308.728,136.255 306.809,137.621 252.882,175.988 
                                222.101,197.888 226.557,202.27 231.942,207.581 237.326,212.886 243.833,219.288 307.02,281.52 		">
                            </polygon>
                            <polygon points="0,137.415 0,150.224 0,281.52 1.479,281.52 60.832,221.766 66.667,215.892 72.127,210.391 77.588,204.891 
                                85.158,197.271 45.731,169.042 8.147,142.135 0,136.299 		"></polygon>
                            <path d="M231.905,222.705l-9.692-9.545l-5.39-5.311l-5.39-5.31l-1.382-1.366l-5.489-5.4l-0.954-0.938
                                c-1.599-1.576-3.27-3.053-4.989-4.461c-12.777-10.457-28.655-16.158-45.399-16.158c-16.767,0-32.616,5.69-45.394,16.137
                                c-1.938,1.582-3.813,3.265-5.598,5.058l-0.334,0.338l-5.363,5.399l-3.452,3.48l-5.458,5.495l-5.46,5.495l-17.921,18.046
                                l-47.276,47.593h274.396L231.905,222.705z"></path>
                        </g>
                    </g>
                </svg>
                dinhhoangducdbp2004@gmail.com
            </a>
            <div class="more_ttlh_tmd">
                <a href="https://www.youtube.com/channel/UCjRCdsqYT4EJ-U9Eb-Rie8Q" title="Follow on YouTube">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-youtube" viewBox="0 0 16 16">
                        <path
                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.260.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100013901885587" title="Follow on Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="lien_ket_tmd">
            <h3>LIÊN KẾT</h3>
            <ul class="lk_ul_tmd">
                <li><a href="index.html">TRANG CHỦ</a></li>
                <li><a href="index.html">GIỚI THIỆU</a></li>
                <li><a href="index.html">LAPTOP VĂN PHÒNG</a></li>
                <li><a href="index.html">LAPTOP GAMING</a></li>
                <li><a href="index.html">BLOGS</a></li>
                <li><a href="index.html">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div class="ho_tro_tmd">
            <h3>HỖ TRỢ</h3>
            <ul class="lk_ul_tmd">
                <li><a href="#">Hướng dẫn mua hàng</a></li>
                <li><a href="#">Hướng dẫn thanh toán</a></li>
                <li><a href="#">Chính sách bảo hành</a></li>
                <li><a href="#">Chính sách đổi trả</a></li>
                <li><a href="#">Tư vấn khách hàng</a></li>
            </ul>
        </div>
    </div>
    <div id="ban_quyen_tmd">
        <div class="container_tmd">
            <p>© Bản quyền thuộc về ANK Dark. <strong>Thiết kế website</strong></p>
            <img src="../Img/img-payment.png" alt="">
        </div>
    </div>
</body>

</html>