<?php

    for ($i = 0; $i < count($orders['payload']['Orders']); $i++) {
        $AmazonOrderId = $orders['payload']['Orders'][$i]['AmazonOrderId'];
        $BuyerEmail = $orders['payload']['Orders'][$i]['BuyerInfo']['BuyerEmail'];
        $EarliestDeliveryDate = $orders['payload']['Orders'][$i]['EarliestDeliveryDate'];
        $EarliestShipDate = $orders['payload']['Orders'][$i]['EarliestShipDate'];
        $LatestDeliveryDate = $orders['payload']['Orders'][$i]['LatestDeliveryDate'];
        $PurchaseDate = $orders['payload']['Orders'][$i]['PurchaseDate'];
        $CurrencyCode = $orders['payload']['Orders'][$i]['OrderTotal']['CurrencyCode'];
        $SalesPrice = $orders['payload']['Orders'][$i]['OrderTotal']['Amount'];
    
        // Create an array to store the data
        $data = [
            'AmazonOrderId' => $AmazonOrderId,
            'BuyerEmail' => $BuyerEmail,
            'EarliestDeliveryDate' => $EarliestDeliveryDate,
            'EarliestShipDate' => $EarliestShipDate,
            'LatestDeliveryDate' => $LatestDeliveryDate,
            'PurchaseDate' => $PurchaseDate,
            'CurrencyCode' => $CurrencyCode,
            'SalesPrice' => $SalesPrice,
        ];
    
        // Serialize the data
        $serializedData = serialize($data);
    
        // SQL query to insert serialized data into the database
        $sql = "INSERT INTO your_table (serialized_data_column) VALUES ('$serializedData')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Serialized data for AmazonOrderId $AmazonOrderId saved successfully.";
        } else {
            echo "Error saving serialized data for AmazonOrderId $AmazonOrderId: " . $conn->error;
        }
    }

?>
