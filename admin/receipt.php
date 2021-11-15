<?php
    require('./includes/database.php');
 if(isset($_POST['order-receipt'])){  
        $orderid = $_POST['hidden-orderid'];
        $custid =$_POST['hidden-custid'];

        // GET ALL ORDER DETAILS

        $querygetOrder = "SELECT * FROM orders WHERE order_id ='$orderid'";
        $sqlgetOrder = mysqli_query($connection, $querygetOrder);
        $rowgetOrder = mysqli_fetch_array($sqlgetOrder);

        $orderdate = $rowgetOrder['order_date'];
        $ordertotal =$rowgetOrder['order_total'];

        $querygetCust = "SELECT * FROM customers WHERE cust_id ='$custid'";
        $sqlgetCust = mysqli_query($connection,$querygetCust);
        $rowgetCust = mysqli_fetch_array($sqlgetCust);

        $custName = $rowgetCust['cust_firstName']. " ". $rowgetCust['cust_lastName'];
        $custAddress =  $rowgetCust['cust_address']. " ". $rowgetCust['cust_barangay']. " ". $rowgetCust['cust_city']. " ". $rowgetCust['cust_country']. " ". $rowgetCust['cust_postalcode'];
        $custEmail = $rowgetCust['cust_email'];
        $custPhone = $rowgetCust['cust_phone'];

            require('.\fpdf184\fpdf.php');
    
            $pdf = new FPDF();

            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 16);

            $pdf->Cell(71 ,10,'',0,0);
            //set font to arial, bold, 14pt
            $pdf->SetFont('Arial','B',14);
            
            //Cell(width , height , text , border , end line , [align] )

            $pdf->Cell(130 ,5,'XYZ GADGETS STORE',0,0);
            $pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

            //set font to arial, regular, 12pt
            $pdf->SetFont('Arial','',12);

            $pdf->Cell(130 ,5,'Alcalde Jose St.',0,0);
            $pdf->Cell(59 ,5,'',0,1);//end of line

            $pdf->Cell(130 ,5,'Pasig City, Metro Manila, 1600',0,0);
            $pdf->Cell(25 ,5,'Date&Time',0,0);
            $pdf->Cell(34 ,5,$orderdate,0,1);//end of line

            $pdf->Cell(130 ,5,'09284110416',0,0);
            $pdf->Cell(25 ,5,'Invoice #',0,0);
            $pdf->Cell(34 ,5,str_pad($orderid, 8 ,0, STR_PAD_LEFT),0,1);//end of line

           

//make a dummy empty cell as a vertical spacer
            $pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
            $pdf->Cell(100 ,5,'Bill to',0,1);//end of line

            //add dummy cell at beginning of each line for indentation
            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5,$custName,0,1);

            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5, $custAddress,0,1);

            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5,$custEmail,0,1);

            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5,'0'. $custPhone,0,1);

//make a dummy empty cell as a vertical spacer
            $pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
            $pdf->SetFont('Arial','B',12);

            $pdf->Cell(130 ,5,'Product',1,0);
            $pdf->Cell(25 ,5,'Quantity',1,0);
            $pdf->Cell(34 ,5,'Amount',1,1);//end of line

            $pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
            $queryGetItem ="SELECT * FROM order_items WHERE order_id='$orderid'";
            $sqlGetItem =mysqli_query($connection,$queryGetItem);
            $subtotal = 0;
            while($rowGetItem = mysqli_fetch_array($sqlGetItem)){
               $productid=  $rowGetItem['product_id'];
               $itemquantity =  $rowGetItem['order_item_quantity'];

               $querygetProduct = "SELECT * FROM products WHERE product_id=' $productid' ";
               $sqlgetProduct = mysqli_query($connection,$querygetProduct);
               $rowgetProduct = mysqli_fetch_array($sqlgetProduct);
               
               $productname = $rowgetProduct['product_name'];
               $productprice = $rowgetProduct['product_price'];
            

               $pdf->Cell(130 ,5,$productname,1,0);
               $pdf->Cell(25 ,5,$itemquantity,1,0);
               $pdf->Cell(34 ,5,number_format($productprice),1,1,'R');//end of line
                
               $subtotal = $subtotal + $productprice;
            }
           

//summary
            $pdf->Cell(130 ,5,'',0,0);
            $pdf->Cell(25 ,5,'Subtotal',0,0);
            $pdf->Cell(10 ,5,'Php',1,0);
            $pdf->Cell(24 ,5, $subtotal,1,1,'R');//end of line

            $pdf->Cell(130 ,5,'',0,0);
            $pdf->Cell(25 ,5,'Shipping',0,0);
            $pdf->Cell(10 ,5,'Php',1,0);
            $pdf->Cell(24 ,5,'120',1,1,'R');//end of line


            $pdf->Cell(130 ,5,'',0,0);
            $pdf->Cell(25 ,5,'Total Due',0,0);
            $pdf->Cell(10,5,'Php',1,0);
            $pdf->Cell(24 ,5,number_format($ordertotal),1,1,'R');//end of line
            
            
          
            
            
            $pdf->Output();
            
                    }
?>