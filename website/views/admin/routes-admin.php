<?php
            if(isset($_GET['option'])):
                switch($_GET['option']):
                   
                                
                                case'logout':
                                    unset($_SESSION['admin']);
                                    header("location:.");
                                    break; 
                                case'showbrands':
                                    include"../views/admin/brands/showbrands.php";
                                    break;
                                    case'addbrand':
                                        include"../views/admin/brands/addbrands.php";
                                        break;
                                        case'updatebrand':
                                        include"../views/admin/brands/updatebrands.php";
                                        break;
                                        case'products':
                                        include"../views/admin/products/showproducts.php";
                                        break;
                                        case'add':
                                        include"../views/admin/products/add.php";
                                        break;
                                        case'updateproduct':
                                        include"../views/admin/products/updateproduct.php";
                                        break;
                                        case'order':
                                        include"../views/admin/order/showorders.php";
                                        break;
                                        case'orderdetail':
                                        include"../views/admin/order/orderdetail.php";
                                        break;
                                endswitch;
                            else:
                                include"../views/admin/home-admin.php";
                            endif;     
                                    
            ?>