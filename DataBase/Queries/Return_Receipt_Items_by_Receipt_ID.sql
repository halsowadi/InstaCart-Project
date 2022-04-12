Select CI.Name , CI.Product_ID
From Cart_items as CI
join Cart as C ON CI.Cart_ID=C.Cart_ID
join Checkout as CO ON CO.Receipt_ID=C.Cart_ID
Where CO.Receipt_ID="input"